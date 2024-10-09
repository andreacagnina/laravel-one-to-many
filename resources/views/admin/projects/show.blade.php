@extends('layouts.app')

@section('content')
    <div class="container my-3">
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
                <div class="content w-h-cust">
                    @if (Str::startsWith($project->cover_project_image, 'https'))
                        <img class="cover_project_image" src="{{ $project->cover_project_image }}"
                            alt="{{ $project->name }}">
                    @else
                        <img class="cover_project_image" src="{{ asset('./storage/' . $project->cover_project_image) }}"
                            alt="{{ $project->name }}">
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="contant">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Descrizione</th>
                                    <th>Slug</th>
                                    <th>Dettagli</th>
                                    <th>Inizio</th>
                                    <th>Fine</th>
                                    <th>Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td>{{ $project->slug }}</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam ullam
                                        consectetur
                                        expedita consequuntur atque itaque reiciendis officiis hic aliquid, dolores vitae
                                        suscipit nulla at laborum inventore quos minus. Eius, minus.</td>
                                    <td>{{ $project->start_date }}</td>
                                    <td>{{ $project->end_date }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-info">
                                                <i class="fa-solid fa-rotate-left"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
