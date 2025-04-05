<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = Contact::all();

        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(ContactRequest $request)
    {
        $validated = $request->validated();

        Contact::create($validated);

        return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);

        return view('contacts.show', compact('contact'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
