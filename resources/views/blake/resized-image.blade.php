@extends('layouts.blake')

@section('content')

    <div id="resize" class="bg-gray-200 px-10 py-10">
        <img src="{{ asset($path) }}" alt="new-image">
    </div>

@endsection
