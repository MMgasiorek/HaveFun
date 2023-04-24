<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class UserRepository extends BaseRepository{

    public function __construct(User $model){

        $this->model= $model;
    }

}