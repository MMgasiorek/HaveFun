@extends('layouts.app')

@section('content')

<div class="container monospace">
    <div class="row mt-2">
        <h3 class="text-center"> Events </h3>
    </div>
    <div class="row mt-2">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-body-secondary">Available Events</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-equalmin">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Place</th>
                                <th scope="col">Start</th>
                                <th scope="col">End</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            @foreach($events_others as $event)
                            <tbody>
                                <tr>
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->place->name }}</td>
                                <td>{{ $event->start_time->format('H:i:s') }}</td>
                                <td>{{ $event->end_time->format('H:i:s') }}</td>
                                <td>
                                <a href="{{ URL::to('/show_event' , [$event->id , 'show'] )}}">
                                    <button type="button" class="btn btn-primary btn-sm">Details</button>
                                </a> 
                                </td>
                                </tr>
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
                    <h6 class="text-body-secondary">My Events</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-equalmin" >
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Place</th>
                                <th scope="col">Start</th>
                                <th scope="col">End</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            @foreach($events_my as $event)
                            <tbody>
                                <tr>
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->place->name }}</td>
                                <td>{{ $event->start_time->format('H:i:s') }}</td>
                                <td>{{ $event->end_time->format('H:i:s') }}</td>
                                <td>
                                <a href="{{ URL::to('/show_event' , [$event->id , 'update'] )}}">
                                    <button type="button" class="btn btn-primary btn-sm">Details</button>
                                </a>  
                                <a href="{{ URL::to('/delete_event' , [$event->id] )}}">
                                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                </a> 
                                </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <h3 class="text-center"> Inspiration </h3>
    </div>

    <div class="row mt-2">
                <div class="col-3">
                    <div class="card shadow mb-4">
                        <div class="card-header bg-success"><h2 class="text-center">Dance #1</h2></div>
                            <div class="card-body">
                                    <p>Add some quality, svg illustrations to your project courtesy of <a
                                        target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                                        constantly updated collection of beautiful</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card shadow mb-4">
                        <div class="card-header bg-warning"><h2 class="text-center">Sports #2</h2></div>
                            <div class="card-body">
                                <p>Add some quality, svg illustrations to your project courtesy of <a
                                        target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                                        constantly updated collection of beautiful</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card shadow mb-4">
                        <div class="card-header bg-primary"><h2 class="text-center">Cards #2</h2></div>
                            <div class="card-body">
                                <p>Add some quality, svg illustrations to your project courtesy of <a
                                        target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                                        constantly updated collection of beautiful</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card shadow mb-4">
                        <div class="card-header bg-danger"><h2 class="text-center">Singing #2</h2></div>
                            <div class="card-body">
                                <p>Add some quality, svg illustrations to your project courtesy of <a
                                        target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                                        constantly updated collection of beautiful</p>
                        </div>
                    </div>
                </div>
            </div>
</div>

@endsection
