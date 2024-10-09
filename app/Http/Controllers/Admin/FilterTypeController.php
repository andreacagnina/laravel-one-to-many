<?php

namespace App\Http\Controllers\Admin;



use App\Models\Type;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilterTypeController extends Controller
{
    public function index($typeName)
    {
        $types = Type::all();

        if ($typeName === 'NC') {
            $projects = Project::whereNull('type_id')->get();
        } else {
            $projects = Type::where('name', $typeName)->firstOrFail()->projects;
        }
        return view('admin.projects.index', compact('projects', 'types'));
    }
}
