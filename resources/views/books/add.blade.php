@extends('layouts.app')
@section('content')
    <div class="w-96 mx-auto p-4">
        <h1 class="text-center text-xl font-semibold">Personal library</h1>
        <p class="text-center mt-4">All set up!</p>
        <div class="bg-white w-96 p-4  rounded shadow-lg" >
            <p class="text-center font-bold text-gray-600 mb-4">Add book</p>
            <form action="">
                <div class="flex flex-col mx-auto">
                    <label for="title" class="text-gray-600 font-bold mb-2">Title</label>

                    <input class=" bg-orange-100 h-8 rounded-lg mb-4" type="text" name="title" id="title">
                    <label for="author" class="text-gray-600 font-bold mb-2">Title</label>

                    <input class="bg-orange-100  h-8 rounded-lg mb-4" type="text" name="author" id="author">

                    <input class="bg-yellow-700 h-8 text-white w-full mx-auto font-semibold rounded-lg" type="submit" name="" id="" value="Add book">
                </div>
            </form>
        </div>
    </div>
@endsection
