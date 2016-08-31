<?php

namespace Modman\Api\V1\Controllers;

use Modman\Api\V1\Controllers\ApiController;

use Illuminate\Http\Request;
use Modman\Api\V1\Models\System;

class SystemController extends ApiController {

    public function index() {
        return $this->respond(System::all());
    }

    public function show(System $system){
        return $this->respond($system);
    }

    public function store(Request $request){
        $system = System::create($request->all());
        return $this->respondCreated($system);
    }

    public function destroy(System $system){
        $system->delete();
        return $this->respondDeleted();
    }

    public function update(System $system, Request $request){
        $system->update($request->all());
        return $this->respondUpdated($system);
    }

}