<?php

namespace Modman\Api\V1\Controllers;

use Modman\Api\V1\Controllers\ApiController;

use Illuminate\Http\Request;
use Modman\Api\V1\Models\Profile;

class ProfileController extends ApiController {

    public function index() {
        return $this->respond(Profile::all());
    }

    public function show(Profile $profile){
        return $this->respond($profile);
    }

    public function store(Request $request){
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