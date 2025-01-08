@extends('layouts.app')
@section('content')
    <p class="text-center font-bold text-gray-600 mb-4">All books</p>

    @foreach ($books as $book)
    <div class="bg-white shadow-lg m-2 p-2 text-sm rounded-md">
        <p class="text-gray-800 font-bold">{{$book->title}}</p>
        <p class="text-gray-500 font-semibold">{{$book->author}}</p>
    </div>
    @endforeach
@endsection
