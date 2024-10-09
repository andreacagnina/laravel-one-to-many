@extends('layouts.app')

@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="d-grid col-12">
                <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Add a New project</a>
            </div>
        </div>
        @if (session('success'))
            <div class="row">
                <div class="col-12">
                    <div class="content mt-1 text-center">
                        <div id="success-alert" class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrizione</th>
                            <th>Slug</th>
                            <th>Inizio</th>
                            <th>Fine</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->description }}</td>
                                <td>{{ $project->slug }}</td>
                                <td>{{ $project->start_date }}</td>
                                <td>{{ $project->end_date }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}"
                                            class="btn btn-outline-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a class="btn btn-outline-warning mx-1"
                                            href="{{ route('admin.projects.edit', ['project' => $project->id]) }}"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        </a>
                                        <form action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger delete"
                                                data-projectName="{{ $project->name }}"><i class="fa-solid fa-trash"></i>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.projects.partials.modal_delete')
@endsection
