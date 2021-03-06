<?php

namespace Modman\Api\V1\Controllers;

use Modman\Api\V1\Controllers\ApiController;

use Illuminate\Http\Request;
use Modman\Api\V1\Models\Profile;

class ProfileController extends ApiController {

    public function index() {
        $user = \Tymon\JWTAuth\Facades\JWTAuth::parseToken()->authenticate();
        return $this->respond(Profile::where('id_users', $user->id)->get());
    }

    public function show(Profile $profile){
        return $this->respond($profile);
    }

    public function store(Request $request){
        $user = \Tymon\JWTAuth\Facades\JWTAuth::parseToken()->authenticate();
        $request->request->add(['id_users' => $user->id]);

        $profile = Profile::create($request->all());
        return $this->respondCreated($profile);
    }

    public function destroy(Profile $profile){
        $profile->delete();
        return $this->respondDeleted();
    }

    public function update(Profile $profile, Request $request){
        $profile->update($request->all());
        return $this->respondUpdated($profile);
    }

}