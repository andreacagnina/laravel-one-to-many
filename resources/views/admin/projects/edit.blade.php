@extends('layouts.app')

@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <div class="content">
                    <h1>Modifica un progetto</h1>
                </div>
            </div>
            <div class="col">
                <form action="{{ route('admin.projects.update', ['project' => $project->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <label for="name" class="form-label">Titolo:</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $project->name) }}"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="description" class="form-label">Descrizione:</label>
                            <textarea name="description" id="description-project" cols="30" rows="5"
                                class="form-control @error('description') is-invalid @enderror">{{ old('description', $project->description) }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="start_date" class="form-label">Start Date:</label>
                            <input type="date" name="start_date" id="start_date"
                                value="{{ old('start_date', $project->start_date) }}"
                                class="form-control @error('start_date') is-invalid @enderror">
                            @error('start_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="end_date" class="form-label">End Date:</label>
                            <input type="date" name="end_date" id="end_date"
                                value="{{ old('end_date', $project->end_date) }}"
                                class="form-control @error('end_date') is-invalid @enderror">
                            @error('end_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="content w-h-cust mb-5">
                                <label for="cover_project_image" class="form-label">Cover Image:</label>
                                @if (Str::startsWith($project->cover_project_image, 'https'))
                                    <img class="cover_project_image" src="{{ $project->cover_project_image }}"
                                        alt="{{ $project->name }}">
                                @else
                                    <img class="cover_project_image"
                                        src="{{ asset('./storage/' . $project->cover_project_image) }}"
                                        alt="{{ $project->name }}">
                                @endif
                            </div>
                        </div>
                        <div class="col-12"> <input type="file" name="cover_project_image" id="cover_project_image"
                                class="form-control @error('cover_project_image') is-invalid @enderror">
                            @error('cover_project_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary my-4">INVIA</button>
                </form>
            </div>
        </div>
    </div>
@endsection
