@extends('layouts.app')

@section('content')

    <h1>Cheat Sheet Compiler</h1>

    <p>Just insert the text from you're notes and click compile. </p>


    <form method="post">
        <textarea id="summernote" name="editordata"></textarea>
    </form>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endsection