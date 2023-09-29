<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;

class ApiController extends Controller
{
    public function index(){
        $users = User::all();

        return UserResource::collection($users);
    }
}
