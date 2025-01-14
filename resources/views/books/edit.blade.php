@extends('layouts.app')
@section('content')
    <div class="bg-white w-96 p-4  rounded shadow-lg">
        <p class="text-center font-bold text-gray-600 mb-4">Add book</p>
        <form method="POST" action="/books.update">
            @method("PUT")
            @csrf
            <div class="flex flex-col mx-auto">
                <label for="title" class="text-gray-600 font-bold mb-2">Title</label>

                <input class=" bg-orange-100 h-8 rounded-lg" type="text" name="title" id="title"
                    value="{{ $book->title }}">

                @error('title')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <label for="author" class="text-gray-600 font-bold mb-2 mt-4">Author</label>

                <input class="bg-orange-100  h-8 rounded-lg" type="text" name="author" id="author"
                    value="{{ $book->title }}">
                @error('author')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <label for="start" class="mt-4 text-gray-600 font-bold mb-2 ">Read at</label>

                <input class="bg-orange-100 h-8 rounded-lg" type="date" id="start" name="date"
                    value="2024-01-01" />
                <div class="flex">

                    <input class="bg-red-700 h-10 text-white mt-4 w-32 mx-auto font-semibold rounded-lg" type="submit"
                        name="" id="" value="Delete">
                    <input class="bg-yellow-700 h-10 text-white mt-4 w-32 mx-auto font-semibold rounded-lg" type="submit"
                        name="" id="" value="Save">
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection
