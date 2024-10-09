<?php

namespace App\Http\Controllers\Admin;



use App\Models\Type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilterTypeController extends Controller
{
    public function index($typeName)
    {
        $types = Type::all();
        $type = Type::where('name', $typeName)->firstOrFail();
        $projects = $type->projects;
        return view('admin.projects.index', compact('projects', 'type', 'types'));
    }
}
