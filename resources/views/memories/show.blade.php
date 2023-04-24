@extends('layouts.app')

@section('content')

<div class="container monospace">
    <div class="row mt-2">
        <h3 class="text-center"> Past Event </h3>
    </div>
    <div class="row mt-2">
        <div class="col-4">
            <div class="card">
                <div class="card-header bg-dark text-light">
                    <h2 class="text-center"> {{$event->name}} </h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 text-center">
                            <p class="fs-6">{{$event->description}}</p>
                        </div>
                        <div class="col-6"> 
                            <img class="img-fluid px-1 px-sm-2 mt-1 mb-1 mx-auto d-block rounded-circle" src="{{ asset('img/avatars/' . $event->id . '.png') }}" alt="...">
                            <p class="fw-semibold text-center">{{$event->user->name}}</p>
                        </div>
                    </div>
                </div>
           </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-body-secondary">Comments</h6>
                </div>
                @foreach ($event->comments as $comment)
                <div class="card-body">
                <b>{{ $comment->user->name }}</b>
                    {{ $comment->content}}
                </div>
                @endforeach
                <div class="card-footer">
                    <textarea class="form-control" placeholder="Add your comment here"></textarea>
                    <button class="btn btn-primary btn-sm mt-2 text-center" type="button">Post comment</button>
                </div>
                
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row mt-2">
        <h3 class="text-center"> Gallery </h3>
    </div>

    <div class="row">
    @if ($filecount > 0) 
    @for ($i = 1; $i <= $filecount; $i++)
    <div class="col-2">
        <div class="card mt-2">
            <div class="card-body">
                <img class="img-fluid" src="{{ asset('img/events/' . $event->id . '/' . $i . '.jpg') }}" alt="...">
            </div>
        </div>
    </div>
    @endfor
    @endif
    </div>
</div>

@endsection
