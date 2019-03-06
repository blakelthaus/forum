@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a New Thread</div>

                    <div class="card-body" style="margin:10px; padding:10px;">
                        <form action="/threads" method="post" role="form">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title">Title: </label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Insert Title">
                            </div>

                            <div class="form-group">
                                <label for="body">Body: </label>
                                <textarea name="body" id="body" class="form-control" rows="8"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
