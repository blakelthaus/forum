
<div class="card" style="margin:10px">
    <div class="card-header">
        <a href="#">{{ $reply->owner->name }}</a> said {{ $reply->created_at->diffForHumans() }}...
    </div>
    <div class="panel-body" style="margin: 10px; padding:10px;">
        {{ $reply->body }}
    </div>
</div>

