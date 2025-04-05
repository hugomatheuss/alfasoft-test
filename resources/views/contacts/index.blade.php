@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold my-4">Lista de Contatos</h1>
        <a href="{{ route('contacts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded mb-4 inline-block">Create New Contact</a>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600"></th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Name</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Email</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Contact</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Options</th>
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
                                <a href="{{ route('contacts.show', $contact->id) }}" class="bg-green-500 hover:bg-green-700 text-black font-bold py-1 px-3 rounded">Show</a>
                                <a href="{{ route('contacts.edit', $contact->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-black font-bold py-1 px-3 rounded">Edit</a>
                                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection