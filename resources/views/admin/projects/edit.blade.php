@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center my-3">
        <h2>Modifica progetto: {{ $project->title }}</h2>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-primary btn-sm my-3">Indietro</a>
    </div>
    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                value="{{ old('title', $project->title) }}">
            @error('title')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <select class="form-select" name="type_id">
                <option value="">Seleziona un tipo</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" @if (old('type_id', $project->type_id) == $type->id) selected @endif>
                        {{ $type->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="project_img" class="form-label">Immagine</label>
            <input type="file" class="form-control @error('project_img') is-invalid @enderror" name="project_img">
            @error('project_img')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <div>
                <label class="form-label">Technologie</label>
            </div>
            @foreach ($technologies as $technology)
                <div class="form-check form-check-inline">
                    @if ($errors->any())
                        <input class="form-check-input" type="checkbox" name="technologies[]"
                            id="technology-{{ $technology->id }}" value="{{ $technology->id }}"
                            {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                        <label class="form-check-label"
                            for="technology-{{ $technology->id }}">{{ $technology->title }}</label>
                    @else
                        <input class="form-check-input" type="checkbox" value="{{ $technology->id }}" name="technologies[]"
                            id="technology-{{ $technology->id }}"
                            {{ $project->technologies->contains($technology->id) ? 'checked' : '' }}>
                        <label class="form-check-label" for="tag-{{ $technology->id }}">{{ $technology->title }}</label>
                    @endif

                </div>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" style="height: 100px">{{ old('description', $project->description) }}</textarea>
            @error('description')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary my-3">Submit</button>
    </form>
@endsection
