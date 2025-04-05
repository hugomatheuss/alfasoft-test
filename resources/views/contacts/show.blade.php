@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Contact Details</h1>
        <div class="space-y-4">
            <div class="flex flex-col">
                <label class="text-sm font-medium text-gray-700">ID</label>
                <p class="mt-1 p-2 border border-gray-300 rounded-md bg-gray-100">{{ $contact->id }}</p>
            </div>
            <div class="flex flex-col">
                <label class="text-sm font-medium text-gray-700">Name</label>
                <p class="mt-1 p-2 border border-gray-300 rounded-md bg-gray-100">{{ $contact->name }}</p>
            </div>
            <div class="flex flex-col">
                <label class="text-sm font-medium text-gray-700">Email</label>
                <p class="mt-1 p-2 border border-gray-300 rounded-md bg-gray-100">{{ $contact->email }}</p>
            </div>
            <div class="flex flex-col">
                <label class="text-sm font-medium text-gray-700">Contact</label>
                <p class="mt-1 p-2 border border-gray-300 rounded-md bg-gray-100">{{ $contact->contact }}</p>
            </div>
        </div>
        <div class="flex justify-end mt-6">
            <a href="{{ route('contacts.index') }}" class="bg-blue-500 hover:bg-blue-600 text-black font-bold py-2 px-4 rounded-md">Back to List</a>
        </div>
    </div>
@endsection