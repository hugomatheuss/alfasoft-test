@extends('layouts.app')

@section('content')
    {{-- <div class="flex items-center justify-center bg-gray-100">
        <div class="container mx-auto px-4"> --}}
            <div class="container mx-auto px-4">
                <h1 class="text-2xl font-bold my-4">Lista de Contatos</h1>
                <a href="{{ route('contacts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded mb-4 inline-block">Criar Novo Contato</a>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">ID</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Nome</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Email</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Telefone</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr class="border-t border-gray-200 hover:bg-gray-50">
                                    <td class="px-4 py-2 text-sm text-gray-700">{{ $contact->id }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-700">{{ $contact->name }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-700">{{ $contact->email }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-700">{{ $contact->phone }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-700">
                                        <a href="{{ route('contacts.show', $contact->id) }}" class="bg-green-500 hover:bg-green-700 text-black font-bold py-1 px-3 rounded">Ver</a>
                                        <a href="{{ route('contacts.edit', $contact->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-black font-bold py-1 px-3 rounded">Editar</a>
                                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        {{-- </div>
    </div> --}}
@endsection