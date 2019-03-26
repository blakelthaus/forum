@extends('layouts.app')

@section('content')

    <h1>Cheat Sheet Compiler</h1>

    <p>So your professor is going to let you have a page of notes on your next exam...</p>
    <p>If you want to make the most out of your page, just insert the text from you're notes into the box below and click compile! </p>


    <form method="post" action="{{ route('compile') }}" id="cheatContent">
        <textarea id="summernote" name="editordata"></textarea>
    </form>

    <button type="submit" form="cheatContent">COMPILE</button>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endsection