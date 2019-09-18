@extends('layouts.blake')

@section('content')

    <div class="px-5 py-5">
        <div class="bg-gray-300">
            <div class="bg-gray-100 flex">
                <div class="px-8 py-12 lg:w-1/2 sm:max-w-xl max-w-md mx-auto lg:max-w-full lg:py-24 lg:px-12">
                    <div class="xl:max-w-lg xl:ml-auto">
                        <img class="h-10" src="/img/logo.svg" alt="Workcation">
                        <img class="mt-6 rounded-lg shadow-xl sm:mt-8 sm:h-64 sm:w-full sm:object-cover sm:object-center lg:hidden" src="/img/beach-work.jpg" alt="Woman Workationing at beach">
                        <h1 class="mt-6 text-4xl font-bold text-gray-900 leading-tight sm:text-4xl sm:mt-8 lg:text-3xl xl:text-4xl">
                            You can work from anywhere.
                            <br class="hidden lg:inline"><span class="text-indigo-500">Take advantage of it. </span>
                        </h1>
                        <p class="mt-2 text-gray-600 sm:mt-4 sm:text-xl">
                            Workation helps you find work friendly rentals in great locations so you can enjoy some nice weather even when your're not on vacation.
                        </p>
                        <div class="mt-4 sm:mt-6">
                            <a href="#" class="btn btn-indigo shadow-lg sm:text-base">Book your escape</a>
                        </div>
                    </div>
                </div>
                <div class="hidden lg:block lg:w-1/2 lg:relative">
                    <img class="absolute inset-0 h-full w-full object-cover object-center" src="/img/beach-work.jpg" alt="Woman Workationing at beach">
                </div>
            </div>
        </div>
    </div>

@endsection