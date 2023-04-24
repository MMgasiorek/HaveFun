@extends('layouts.app')

@section('content')

<div class="container monospace">
    <div class="row mt-2">
        <h3 class="text-center"> Past Events </h3>
    </div>

    <div class="row mt-2">
@foreach($events_rand as $event)
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
                            <img class="img-fluid px-1 px-sm-2 mt-1 mb-1 mx-auto d-block rounded-circle" src="{{ asset('img/avatars/' . $event->user->id . '.png') }}" alt="...">
                            <p class="fw-semibold text-center">{{$event->user->name}}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center bg-dark text-light">
                    <div class="row">
                        <div class="col-4">
                            <a href="{{ URL::to('/show_memory' , [$event->id] )}}">
                                <button type="button" class="btn btn-warning">Show</button>
                            </a>
                        </div>
                        <div class="col-4">
                            <i class="fa fa-calendar"></i>
                            <p>{{ $event->date }} </p>
                        </div>
                        <div class="col-4">
                            <i class="fa fa-address-book"></i> 
                            <p>
                            {{$event->members->count()}}
                            </p>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
@endforeach
    </div>

    <div class="row mt-2 mb-3">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-body-secondary">Most Members</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-equal" >
                        <table class="table table-sm">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Author</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                            @foreach ($most_members as $event)
                            <tbody>
                                <tr>
                                <th scope="row">{{ $event->id }}</th>
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->user->name }}</td>
                                <td>
                                    <a href="{{ URL::to('/show_memory' , [$event->id] )}}">
                                        <button type="button" class="btn btn-success bt-sm">Show</button>
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
                    <h6 class="text-body-secondary">Most Intrensting</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive " style="max-height:450px;">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Author</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            @foreach ($most_comments as $event)
                            <tbody>
                                <tr>
                                <th scope="row">{{ $event->id }}</th>
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->user->name }}</td>
                                <td>
                                    <a href="{{ URL::to('/show_memory' , [$event->id] )}}">
                                        <button type="button" class="btn btn-success bt-sm">Show</button>
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
