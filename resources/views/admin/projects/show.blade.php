@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center my-3">
        <h3>{{ $project->title }}</h3>
        <div>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary btn-sm my-3">Indietro</a>
            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-secondary btn-sm mx-2">Modifica</a>
        </div>
    </div>
    <div>
        @if ($project->project_img)
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/' . $project->project_img) }}">
            </div>
        @endif
        <p>{{ $project->description }}</p>
        <div class="my-3">
            <h5><span class="badge text-bg-dark">{{ $project->type?->title }}</span></h5>
        </div>
        <div>
            <h5>Tecnologie:</h5>
            <ul>
                @foreach ($project->technologies as $technology)
                    <li>{{ $technology->title }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
