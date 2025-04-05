@extends('layouts.app')

@section('content')
@if (session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
@endif

    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Create New Contact</h1>
        <form action="{{ route('contacts.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="flex flex-col">
                <label for="name" class="text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="mt-1 p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" value="{{ old('name') }}" required>
                @error('name')
                    <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="email" class="text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="mt-1 p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" value="{{ old('email') }}" required>
                @error('email')
                    <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="contact" class="text-sm font-medium text-gray-700">Contact</label>
                <input type="text" name="contact" id="contact" class="mt-1 p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" value="{{ old('contact') }}">
                @error('contact')
                    <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-black font-bold py-2 px-4 rounded-md">Save</button>
            </div>
        </form>
    </div>
@endsection