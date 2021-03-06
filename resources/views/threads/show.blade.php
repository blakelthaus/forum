@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="level">
                            <span class="flex">
                                <a href="{{ route('profile', $thread->creator) }}">{{ $thread->creator->name }}</a> posted: {{$thread->title}}
                            </span>
                            @can('update', $thread)
                                <form action="{{ $thread->path() }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-link"> Delete Thread</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                    <div class="panel-body" style="margin: 10px; padding:10px;">
                        {{ $thread->body }}
                    </div>
                </div>

                <?php $replies = $thread->replies()->paginate(5); ?>

                @foreach ($replies as $reply)
                    @include ('threads.reply')
                @endforeach

                {{ $replies->links() }}

                @if (auth()->check())
                    <form action="{{ $thread->path() . '/replies' }}" method="post" role="form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="sr-only" for="reply">Reply</label>
                            <textarea name="body" id="reply" class="form-control" placeholder="Have something to say?" rows="5"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Post</button>
                    </form>
                @else
                    <p class="text-center">Please <a href="{{ route('login') }}">sign in</a> to participate in this discussion</p>
                @endif
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="panel-body" style="margin: 10px; padding:10px;">
                        <p>
                            This Thread was published {{ $thread->created_at->diffForHumans() }} by
                            <a href="#">{{ $thread->creator->name }}</a>, and currently has
                            {{ $thread->replies_count }} {{ str_plural('comment', $thread->replies_count) }}.
                        </p>
                    </div>
                </div>
                <div class="panel-body" style="margin: 10px; padding:10px;">
                     {{ $replies->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
