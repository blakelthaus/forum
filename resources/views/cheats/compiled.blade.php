@extends('layouts.app')

@section('content')

    <h1>Cheat Sheet Compiler</h1>


    <div class="alert alert-success">Your PDF compiled successfully and is downloading.</div>

    <a href="{{ route('cheatSheet') }}">Make another Cheat Sheet?</a>

@endsection
