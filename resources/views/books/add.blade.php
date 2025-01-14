@extends('components/layouts.app')
@section('content')
        <div class="bg-white w-96 p-4  rounded shadow-lg" >
            <p class="text-center font-bold text-gray-600 mb-4">Add book</p>
            <form method="POST" action="/books">
                @csrf
                <div class="flex flex-col mx-auto">
                    <label for="title" class="text-gray-600 font-bold mb-2">Title</label>

                    <input class=" bg-orange-100 h-8 rounded-lg" type="text" name="title" id="title" value="{{old('title')}}">

                    @error('title')
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                    <label for="author" class="text-gray-600 font-bold mb-2 mt-4">Author</label>

                    <input class="bg-orange-100  h-8 rounded-lg" type="text" name="author" id="author" value="{{old('author')}}">
                    @error('author')
                        <p class="text-red-500">{{$message}}</p>
                    @enderror

                    <input class="bg-yellow-700 h-8 text-white mt-4 w-full mx-auto font-semibold rounded-lg" type="submit" name="" id="" value="Add book">
                </div>
            </form>
        </div>
    </div>
@endsection
