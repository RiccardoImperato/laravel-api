@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center my-3">
        <h2>Progetti</h2>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary btn-sm">Nuovo progetto</a>
    </div>
    @if (session('message'))
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Notifica</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('message') }}
                </div>
            </div>
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Repository</th>
                <th scope="col">Description</th>
                <th scope="col" class="text-end">Handle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->description }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('admin.projects.show', $project) }}"
                                class="btn btn-primary btn-sm ">Dettagli</a>
                            <a href="{{ route('admin.projects.edit', $project) }}"
                                class="btn btn-secondary btn-sm mx-2">Modifica</a>
                            {{-- Button trigger modal  --}}
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#exampleModal-{{ $project->id }}">
                                Elimina
                            </button>
                            {{-- Button trigger modal  --}}
                            {{-- Modal  --}}
                            <div class="modal fade" id="exampleModal-{{ $project->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Sei sicuro di voler eliminare: {{ $project->title }}?
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Chiudi</button>
                                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input class="btn btn-danger" type="submit" value="Elimina">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Modal  --}}
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
