<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrower;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'title' => [
                    'required',
                    'string',
                    'max:50',
                    Rule::unique('books')->where(function ($query) use ($request) {
                        return $query->where('author', $request->author);
                    }),
                ],
                'author' => ['required', 'string', 'max:50']
            ],
            ['title.unique' => 'This book is already in your library']
        );

        Book::create([
            'title' => $validated["title"],
            'author' => $validated["author"],
        ]);

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
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate(
            [
                'title' => [
                    'required',
                    'string',
                    'max:50',
                    Rule::unique('books')->where(function ($query) use ($request) {
                        return $query->where('author', $request->author);
                    })->ignore($book->id),
                ],
                'author' => ['required', 'string', 'max:50'],
                'read_at' => ['nullable', 'date']
            ],
            ['title.unique' => 'This book is already in your library']
        );

        $book->update($validated);
        session()->flash('status', "$book->title updated successfully!");

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        session()->flash('status', "$book->title deleted successfully!");
        return redirect()->route('books.index');
    }
}
