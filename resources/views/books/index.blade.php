@extends('layouts.app')
@section('content')
    <p class="text-center font-bold text-gray-600 mb-4">Add books</p>

    @for ($i = 1; $i <= 4; $i++)
        <div class="bg-white shadow-lg m-2 p-2 text-sm rounded-md">
            <p class="text-gray-800 font-bold">Title: sample text</p>
            <p>John doe</p>
        </div>
    @endfor
@endsection
