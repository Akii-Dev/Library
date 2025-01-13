<?php

namespace App\Http\Controllers;

use App\Models\Book;
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'title' => ['required', 'string','max:50',
                Rule::unique('books')->where(function ($query) use ($request) {
                    return $query->where('author', $request->author);
                }),],
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
