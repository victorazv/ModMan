<?php

namespace Modman\Api\V1\Controllers;

use Modman\Api\V1\Controllers\ApiController;

use Illuminate\Http\Request;
use Modman\Api\V1\Models\User;

class UserController extends ApiController {

    public function index() {
        return $this->respond(User::all());
    }

    public function show(User $user){
        return $this->respond($user);
    }

    public function store(Request $request){
        $user= User::create($request->all());
        return $this->respondCreated($user);
    }

    public function destroy(User $user){
        $user->delete();
        return $this->respondDeleted();
    }

    public function update(User $user, Request $request){
        $user->fill($request->all());
        $user->save();
        return $this->respondUpdated($user);
    }

}