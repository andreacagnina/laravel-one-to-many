@extends('layouts.app')

@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <div class="content">
                    <h1>Aggiungi un nuovo progetto</h1>
                </div>
            </div>
            <div class="col">
                <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <label for="name" class="form-label">Titolo:</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
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
                                class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="start_date" class="form-label">Start Date:</label>
                            <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}"
                                class="form-control @error('start_date') is-invalid @enderror">
                            @error('start_Date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="end_date" class="form-label">End Date:</label>
                            <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}"
                                class="form-control @error('end_date') is-invalid @enderror">
                            @error('end_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="cover_project_image" class="form-label">Cover Image:</label><input type="file"
                                name="cover_project_image" id="cover_project_image"
                                class="form-control @error('cover_project_image') is-invalid @enderror">
                            @error('cover_project_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary my-4" id="liveToastBtn">INVIA</button>
                </form>
            </div>
        </div>
    </div>
@endsection
