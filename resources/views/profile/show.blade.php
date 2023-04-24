@extends('layouts.app')

@section('content')

<div class="container monospace">
    <div class="row mt-2">
        <h3 class="text-center"> Your Profile <b>{{ $user->name }}</b></h3>
    </div>
    <div class="row mt-2">
        <div class="col-6">
            <div class="row">
                <div class="col-6">
                    <img src="img/avatars/{{$user->id}}.png" class="rounded-circle"><img>
                </div>
                <div class="col-6">
                    <h2>{{ $user->id }} : {{ $user->name }}</h2>
                        <a href="{{ URL::to('/edit_user')}}">
                            <button type="button" class="btn btn-warning btn-sm">Edit Profile</button>
                        </a>
                </div>
            </div>
        </div>
        <div class="col-6">

        </div>
    </div>
    <div class="row mt-2">
        <h3 class="text-center"> Your Events </h3>
    </div>
    <div class="row mt-2">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h6>Here you was</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-equalmin" >
                        <table class="table table-sm">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Author</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                            @foreach ($user->member_event as $event)
                            <tbody>
                                <tr>
                                <th scope="row">{{ $event->id }}</th>
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->user->name }}</td>
                                <td>
                                    <a href="{{ URL::to('/show_memory' , [$event->id] )}}">
                                        <button type="button" class="btn btn-success btn-sm">Show</button>
                                    </a> 
                                </td>
                                </tr>
                                <tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h6>You Created</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-equalmin" >
                        <table class="table table-sm">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Author</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                            @foreach ( $user->events as $event)
                            <tbody>
                                <tr>
                                <th scope="row">{{ $event->id }}</th>
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->user->name }}</td>
                                <td>
                                    <a href="{{ URL::to('/show_memory' , [$event->id] )}}">
                                        <button type="button" class="btn btn-success btn-sm">Show</button>
                                    </a> 
                                </td>
                                </tr>
                                <tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
