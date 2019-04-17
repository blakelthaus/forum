@extends('layouts.app')

@section('content')
    <div class="page-header">
        <h1>
            {{ $profileUser->name }}
            <small>User since {{ $profileUser->created_at->diffForHumans() }}</small>
        </h1>
    </div>

    @foreach ($threads as $thread)
        <div class="card">
            <div class="card-header">
                <div class="level">
                    <span class="flex">
                        <a href="#">{{ $thread->creator->name }}</a> posted:
                        {{$thread->title}}
                    </span>
                    <span>
                        {{ $thread->created_at->diffForHumans() }}
                    </span>
                </div>

            </div>
            <div class="panel-body" style="margin: 10px; padding:10px;">
                {{ $thread->body }}
            </div>
        </div>
    @endforeach

    {{ $threads->links() }}

@endsection
