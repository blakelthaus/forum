@extends('layouts.blake')

@section('content')

    <div id="sidebar" class="bg-green-600 px-4 py-12 lg:px-12 h-screen w-1/4">
        <h1 class="py-4 text-white lg:text-4xl sm:text-2xl">Blake Borgholthaus</h1>
        <img class="mx-auto rounded-full content-center" src="/img/blake.jpg" alt="Blakes Picture">
        <ul class="py-6">
            <li class="py-2 flex text-white lg:text-3xl sm:text-2xl"><a class="hover:text-black" href="#">Resume</a></li>
            <li class="py-2 flex text-white lg:text-3xl sm:text-2xl"><a class="hover:text-black" href="#">About Me</a></li>
            <li class="py-2 flex text-white lg:text-3xl sm:text-2xl"><a class="hover:text-black" href="#">Data Visualization</a></li>
        </ul>
    </div>

@endsection
