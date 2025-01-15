@extends('components/layouts.app')
@section('content')
    <div class="bg-white p-4 mx-auto w-max rounded shadow-lg">
        <p class="text-center font-bold text-gray-600 mb-4">Add book borrowers</p>
        <form action="{{ route('books.store-borrowers') }}" method="POST">
            @csrf
            <div class="flex flex-col">
            
            <div class="flex justify-around font-bold">
                <p>Name</p>
                <p>Email</p>
                <p>Phone</p>
            </div>
            @for ($i = 1; $i <= 5; $i++)
                <div class="flex justify-around">
                    <div>
                        <input class="rounded-md outline outline-1 m-0.5 p-0.5 text-sm w-52" type="text" name="borrowers[{{$i}}][name]" value="{{old("borrowers.$i.name")}}">
                        @error("borrowers.$i.name")
                            <p class="text-red-500 mb-1 text-center">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <input class="rounded-md outline outline-1 m-0.5 p-0.5 text-sm w-52" type="email" name="borrowers[{{$i}}][email]" value="{{old("borrowers.$i.email")}}">
                        @error("borrowers.$i.email")
                            <p class="text-red-500 mb-1 text-center">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <input class="rounded-md outline outline-1 m-0.5 p-0.5 text-sm w-52" type="tel" name="borrowers[{{$i}}][phone_number]" value="{{old("borrowers.$i.phone_number")}}">
                        @error("borrowers.$i.phone_number")
                            <p class="text-red-500 mb-1 text-center">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            @endfor
            <input class="bg-yellow-700 h-10 text-white mt-4 w-36 mx-auto font-semibold rounded-lg" type="submit" name="" id="" value="Save">

        </div>
        </form>
    </div>
    </div>
@endsection
