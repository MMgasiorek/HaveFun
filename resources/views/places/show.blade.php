@extends('layouts.app')

@section('content')

<div class="container monospace">
    <div class="row mt-2">
        <h3 class="text-center"> {{ $place->name }} </h3>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="text-body-secondary">Last Events</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-equalmin">
                                <table class="table table-sm">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                    @foreach ($end_events as $event)
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
                <div class="col-12 mt-2">
                    <div class="card">
                            <div class="card-header">
                                <h6 class="text-body-secondary">Coming Events</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-equalmin">
                                    <table class="table table-sm">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                        @foreach ($coming_events as $event)
                                        <tbody>
                                            <tr>
                                            <th scope="row">{{ $event->id }}</th>
                                            <td>{{ $event->name }}</td>
                                            <td>{{ $event->user->name }}</td>
                                            <td>
                                                <a href="{{ URL::to('show_event' , [$event->id , 'show'] )}}">
                                                    <button type="button" class="btn btn-primary bt-sm">Join</button>
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
        <div class="col-6">
            <div class="card ">
                <div class="card-header">
                    <h6 class="text-body-secondary">Available Times</h6>
                </div>
                <div class="card-body">
                @foreach($place->events as $place_details)
                    {
                        <p>{{ $place_details->name }}</p>
                        <p>{{ $place_details->start_time }}</p>
                        <p>{{ $place_details->end_time }}</p>
                    }
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
