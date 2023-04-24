<?php

namespace App\Repositories;

use App\Models\Place;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PlaceRepository extends BaseRepository{

    public function __construct(Place $model){

        $this->model= $model;
    }

}