@extends('layouts.app')

@section('content')
<div class="container">
    <div class="my-4 d-flex justify-content-between align-items-center">
        <h1 class="text-uppercase ">Contatti</h1>
        <div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Torna a Dashboard</a>
        </div>
    </div>

    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>
                    <ul class="d-flex list-unstyled gap-2 justify-content-end align-items-center m-0">
                        <li><a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-success p-2">Dettaglio</a></li>
                        <li><a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#contact-{{ $contact->id }}">Cancella</a></li>
                    </ul>
                </td>
            </tr>

            <div class="modal fade" id="contact-{{ $contact->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Cancella il contatto {{ $contact->name }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Attenzione! Sei sicuro di voler cancellare il contatto? Procedi?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Indietro</button>
                            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Conferma" class="btn btn-danger p-2">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
</div>
@endsection