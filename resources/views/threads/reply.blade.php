
<div class="card" style="margin:10px">
    <div class="card-header">
        <div class="level">
            <h6 class="flex">
                <a href="#">
                    {{ $reply->owner->name }}
                </a> said {{ $reply->created_at->diffForHumans() }}...
            </h6>
            <div>
                <form action="/forum/replies/{{ $reply->id }}/favorites" method="POST" role="form">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-default" {{ $reply->isFavorited() ? 'disabled' : '' }}>
                        {{ $reply->favorites_count }} {{ str_plural('Favorite', $reply->favorites_count) }}
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="panel-body" style="margin: 10px; padding:10px;">
        {{ $reply->body }}
    </div>
</div>

