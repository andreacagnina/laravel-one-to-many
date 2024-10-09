<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Str;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data = $request->validated();
        $form_data['slug'] = Project::generateSlug($form_data['name']);

        if ($request->hasFile('cover_project_image')) {
            $form_data['cover_project_image'] = Storage::put('cover_project_image', $form_data['cover_project_image']);
        } else {
            $form_data['cover_project_image'] = 'https://placehold.co/600x400?text=Project+Image';
        }

        Project::create($form_data);

        return redirect()->route('admin.projects.index')->with("success", "Progetto Creato");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view("admin.projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view("admin.projects.edit", compact("project"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {

        $form_data = $request->validated();
        $form_data['slug'] = Project::generateSlug($form_data['name']);

        if ($request->hasFile('cover_project_image')) {
            if (Str::startsWith($project->cover_project_image, 'https') === false) {
                Storage::delete($project->cover_project_image);
            }

            $form_data['cover_project_image'] = Storage::put('cover_project_image', $form_data['cover_project_image']);
        }

        $project->update($form_data);
        return redirect()->route('admin.projects.show', ['project' => $project->id])->with("success", "Progetto Modificato");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if (Str::startsWith($project->cover_project_image, 'https') === false) {
            Storage::delete($project->cover_project_image);
        }
        $project->delete();
        return redirect()->route("admin.projects.index")->with("success", "Progetto Cancellato");
    }
}
