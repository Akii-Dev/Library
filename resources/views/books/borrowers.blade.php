@extends('components/layouts.app')
@section('content')
    <div class="bg-white p-4 mx-auto w-max rounded shadow-lg">
        <p class="text-center font-bold text-gray-600 mb-4">Add book borrowers</p>
        <form method="POST" action="/books">
            @csrf
            <div class="flex justify-around font-bold">
                <p>Name</p>
                <p>Email</p>
                <p>Phone</p>
            </div>
            @for ($i = 1; $i <= 5; $i++)
                <div class="flex justify-around">
                    @for ($j = 1; $j <= 3; $j++)
                        <input class="rounded-md outline outline-1 m-0.5 p-0.5 text-sm w-52" type="text" name="" id="">
                    @endfor

                </div>
            @endfor
        </form>
    </div>
    </div>
@endsection
