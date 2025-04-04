@extends('layouts.app')

@section('content')
    <h1>Criar Novo Contato</h1>
    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="form-group">
            <label for="contact">Telefone</label>
            <input type="text" name="contact" id="contact" class="form-control" value="{{ old('contact') }}">
        </div>
        <div class="form-group">
            <label for="message">Mensagem</label>
            <textarea name="message" id="message" class="form-control">{{ old('message') }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
@endsection