<?php

namespace App\Http\Controllers;

use App\Enums\DatabaseErrorCode;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        $contacts = Contact::withTrashed()->get();

        return view('contacts.index', compact('contacts'));
    }

    public function create(): View
    {
        return view('contacts.create');
    }

    public function store(ContactRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        try {
            Contact::query()->create($validated);

            return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() === DatabaseErrorCode::UNIQUE_CONSTRAINT_VIOLATION->value) {
                return redirect()->back()->withInput()->with('error', 'The contact number already exists. Please use a different one.');
            }

            return redirect()->back()->withInput()->with('error', 'An unexpected error occurred. Please try again later.');
        }
    }

    public function show(int $id): View
    {
        $contact = Contact::query()->findOrFail($id);

        return view('contacts.show', compact('contact'));
    }

    public function edit(int $id): View
    {
        return view('contacts.edit', [
            'contact' => Contact::query()->findOrFail($id),
        ]);
    }

    public function update(ContactRequest $request, int $id): RedirectResponse
    {
        $validated = $request->validated();

        try {
            $contact = Contact::query()->findOrFail($id);
            $contact->update($validated);

            return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() === DatabaseErrorCode::UNIQUE_CONSTRAINT_VIOLATION->value) {
                return redirect()->back()->withInput()->with('error', 'The contact number already exists. Please use a different one.');
            }

            return redirect()->back()->withInput()->with('error', 'An unexpected error occurred. Please try again later.');
        }
    }

    public function destroy(int $id): RedirectResponse
    {
        try {
            $contact = Contact::query()->findOrFail($id);
            $contact->delete();

            return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.');
        }
    }

    public function restore(int $id): RedirectResponse
    {
        try {
            $contact = Contact::withTrashed()->findOrFail($id);
            $contact->restore();

            return redirect()->route('contacts.index')->with('success', 'Contact restored successfully.');
        } catch (\Exception $e) {
            return redirect()->route('contacts.index')->with('error', 'An unexpected error occurred. Please try again later.');
        }
    }
}
