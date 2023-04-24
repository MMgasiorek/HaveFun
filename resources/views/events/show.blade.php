@extends('layouts.app')

@section('content')

<div class="container monospace">
    <div class="row mt-2">
        <h3 class="text-center"> <b>{{ $event->name }}</b> </h3>
    </div>
    <div class="row">
        <div class="col-6">
            {{ $event->name }}
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-body-secondary">Event Members</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                    @foreach ($event->members as $user)
                        <div class="col-4">
                        <img class="img-fluid rounded-circle" src="{{ asset('img/avatars/' . $user->id . '.png') }}" alt="...">\
                        <p class="text-center">{{ $user->name }}</p>
                        </div>                 
                     @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <a href="{{ URL::to('/join' , [$event->id] )}}">
            <button type="button" class="btn btn-primary">Join</button>
        </a>  
    </div>
</div>

@endsection

nazwa 
data i godzina 
miejsce 
opis 

