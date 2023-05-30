@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="my-4 d-flex justify-content-between align-items-center">
            <div>
                <h1>Messaggio da {{ $contact->name }}</h1>
                <a href="mailto: {{ $contact->email }}">{{ $contact->email }}</a>
            </div>
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-primary">Torna ai Contatti</a>
        </div>
        
        <p class="my-5">{{ $contact->message }}</p>
    </div>
@endsection