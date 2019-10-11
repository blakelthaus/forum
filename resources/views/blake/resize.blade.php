@extends('layouts.blake')

@section('content')

    <div id="resize" class="bg-gray-200 px-10 py-10">
        <form id="resizeForm" name="resizeForm" method="post" action="/submit-resize" enctype="multipart/form-data">
            @csrf

            <label for="image">Choose an Image to Resize: </label><br>
            <input type="file" id="image" name="image" accept="image/png, image/jpeg">
            <br>
            <br>

            <label for="width">Width:</label>
            <input type="number" id="width" name="width">
            <br>
            <br>

            <label for="width">Height:</label>
            <input type="number" id="height" name="height">
            <br>
            <br>

            <input type="submit" form="resizeForm">

        </form>
    </div>

@endsection
