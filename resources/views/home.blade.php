@extends('layouts.app')

@section('content')
<div class="container monospace">
    <div class="row mt-4">
        <div class="col-12">
            <h1 class="text-center">Hello <b class="text-success">{{ Auth::user()->name }}</b></h1>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-4">
            <div class="card">
                <div class="card-header bg-dark text-warning">
                    <h2>Create Events</h2>
                </div>
                <div class="card-body">
                    <img class="img-fluid" src="{{ asset('img/app/2.jpg') }}" alt="...">
                    <p class="text-center">
                        Add some quality, svg illustrations to your project courtesy of 
                        unDraw, a constantly updated.
                    </p>
                    <div class="text-center">
                        <a href="{{ URL::to('/create_event')}}">
                                <button type="button" class="btn btn-primary btn-sm">Create</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header bg-dark text-warning">
                    <h2>Memories</h2>
                </div>
                <div class="card-body">
                    <img class="img-fluid " src="{{ asset('img/app/1.jpg') }}" alt="...">
                    <p class="text-center">
                        Add some quality, svg illustrations to your project courtesy of 
                        unDraw, a constantly updated. courtesy of 
                        unDraw, a constantly updated
                    </p>
                    <div class="text-center">
                        <a href="{{ URL::to('/memories')}}">
                                <button type="button" class="btn btn-warning btn-sm">Show</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header bg-dark text-warning">
                    <h2>Join To events</h2>
                </div>
                <div class="card-body">
                    <img class="img-fluid" src="{{ asset('img/app/3.jpg') }}" alt="...">
                    <p class="text-center">
                        Add some quality, svg illustrations to your project courtesy of 
                        unDraw, a constantly updated.
                    </p>
                    <div class="text-center">
                        <a href="{{ URL::to('/events')}}">
                                <button type="button" class="btn btn-danger btn-sm">Join</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container monospace">
    <div class="row mt-4">
        <p class="text-center">
        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc
        </p>
    </div>
</div>
@endsection
