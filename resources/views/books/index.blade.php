@extends('layouts.app')
@section('content')

@if(session('status'))
    <p class="text-center text-lime-700 bg-white outline outline-lime-700 outline-2 font-semibold rounded-md py-4 my-2">
        {{ session('status') }}
    </p>
@endif
    <p class="text-center font-bold text-gray-600 mb-4">All books</p>

    @foreach ($books as $book)
    <a href="/books/{{ $book->id }}/edit">
        <div class="bg-white shadow-lg m-2 p-2 text-sm rounded-md">
            <p class="text-gray-800 font-bold">{{ $book->title }}</p>
            <div class="flex justify-between">
                  <p class="text-gray-500 font-semibold">{{ $book->author }}</p>
                <div id="book-status" class="flex">
                    @if ($book['read_at'] !== null)
                        <p id="bookp{{ $book['id'] }}" class="mr-2">Finished</p>
                        <input type="checkbox" class="accent-orange-700" id="{{ $book['id'] }}" checked>
                    @else
                        <p id="bookp{{ $book['id'] }}" class="mr-2">On the shelf</p>
                        <input type="checkbox" class="accent-orange-700" id="{{ $book['id'] }}">
                    @endif
                </div>
            </div>
        </div>
        </a>
    @endforeach
@endsection
