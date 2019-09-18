@extends('layouts.blake')

@section('content')

    <div id="contact" class="bg-gray-200 px-10 py-10">
        <form method="post" action="/contact/submit">
            <label for="name" class="pt-10">Name</label>
            <input class="form-input" type="text" id="name" name="name" placeholder="Joe Schmoe">
            <label for="name" class="pt-10">Email</label>
            <input class="form-input" type="email" id="name" name="name" placeholder="joe@schmoe.com">
            <label for="name" class="pt-10">Reason For Contacting</label>
            <input class="form-input" type="text" id="name" name="name" placeholder="Hey man, wanted to learn more about...?">
            <a class="btn btn-green my-10">Submit</a>
        </form>
    </div>

@endsection