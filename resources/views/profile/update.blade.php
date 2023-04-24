@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('update_user') }}" method="POST" role="form" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="form-group">
                            <label for="name">Name</label>
                                <input type="text" class="form-control" name="name"/>                            
                            </div>
                            <label for="photo">Upload avatar</label>
                                <input type="file" name="photo" class="form-control">                          
                            </div>

                            <div class="text-center mb-4">
                                <input type="submit" value="Update" class="btn btn-primary btn-sm" />
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
