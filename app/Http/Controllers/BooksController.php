<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteBookRequest;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Borrower;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'books.index',
            ['books' => Book::all()]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.add');
    }

    public function borrowers()
    {
        return view('books.borrowers');
    }

    public function borrowersStore(Request $request)
    {
        $validated = $request->validate(
            [
                'borrowers.*.name' => [
                    'nullable',
                    'string',
                    'max:50',
                    'required_with:borrowers.*.email,borrowers.*.phone_number'
                ],

                'borrowers.*.email' => [
                    'nullable',
                    'email',
                    'max:100',
                    'required_with:borrowers.*.name,borrowers.*.phone_number'
                ],

                'borrowers.*.phone_number' => [
                    'nullable',
                    'regex:/^06\d{8}$/',
                    'required_with:borrowers.*.name,borrowers.*.email'
                ],
            ],
            [
            'borrowers.*.name.required_with' => 'Missing name',
            'borrowers.*.name.max' => 'Name is too long',
            'borrowers.*.email.required_with' => 'Missing email',
            'borrowers.*.email.email' => 'Invalid email',
            'borrowers.*.phone_number.required_with' => 'Missing phone number',
            'borrowers.*.phone_number.regex' => 'Invalid number'
            ]);
            foreach ($validated['borrowers'] as $borrower) {
                if ($borrower["name"] !== null) {
                    Borrower::create($borrower);
                }
            }

            return redirect()->route('books.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request): RedirectResponse
{
    Book::create($request->validated());

    session()->flash('status', "$request->title posted successfully!");

    return redirect()->route('books.index');
}


    public function toggleRead(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:books,id',
        ]);

        $book = Book::findOrFail($validated['id']);

        $book->update([
            'read_at' => $book->read_at ? null : date("y-m-d"),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view(
            'books.edit',
            ['book' => Book::find($id)]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request , Book $book): RedirectResponse
    {
        
        $book->update($request->validated());

        session()->flash('status', "$book->title updated successfully!");
    
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteBookRequest $request, Book $book): RedirectResponse
    {
        $book->delete();

        session()->flash('status', "$book->title deleted successfully!");
        return redirect()->route('books.index');
    }
}
