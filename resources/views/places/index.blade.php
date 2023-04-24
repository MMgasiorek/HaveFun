@extends('layouts.app')

@section('content')

<div class="container monospace">
    <div class="row mt-2">
        <h3 class="text-center"> Places </h3>
    </div>
    <div class="row mt-2">
        @foreach ($places as $place)
        <div class="col-4">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h4 class="text-body-secondary">{{$place->name}}</h4>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid" src="{{ asset('img/places/' . $place->id . '.jpg') }}" alt="...">
                    </div>
                            <p class="text-center">Add some quality, svg illustrations to your project courtesy of <a
                                target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                                constantly updated.
                            </p>
                    <div class="text-center">
                        <a href="{{ URL::to('/show_place' , [$place->id] )}}">
                                <button type="button" class="btn btn-warning btn-sm">Show</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection
