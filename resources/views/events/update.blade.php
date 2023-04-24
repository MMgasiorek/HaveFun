@extends('layouts.app')

@section('content')

<div class="container monospace">
    <div class="row mt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-body-secondary">Update Event</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('update_event') }}" method="POST" role="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="event_id" value="{{ $event->id }}" />
                        <div class="form-group">
                            <label for="name">Name</label>
                                <input type="text" class="form-control" name="name"/>                            
                            </div>
                            <label for="place_id">Place</label>
                                <input type="text" class="form-control" name="place_id"/>                            
                            </div>
                            <div class="form-group">
                            <label for="date">Date</label>
                                <input type="date" class="form-control" name="date"/>                            
                            </div>
                            <div class="form-group">
                            <label for="start_time">Start</label>
                                <input type="time" class="form-control" name="start_time"/>                            
                            </div>
                            <div class="form-group">
                            <label for="end_time">End</label>
                                <input type="time" class="form-control" name="end_time"/>                            
                            </div>
                            <div class="form-group">
                            <label for="description">description</label>
                                <input type="text" class="form-control" name="description"/>                            
                            </div>
                            <div class="text-center">
                                <input type="submit" value="Update" class="btn btn-primary btn-sm" />
                            </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
