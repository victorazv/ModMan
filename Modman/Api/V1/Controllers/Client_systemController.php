<?php

namespace Modman\Api\V1\Controllers;

use Modman\Api\V1\Controllers\ApiController;

use Illuminate\Http\Request;
use Modman\Api\V1\Models\Client;
use Modman\Api\V1\Models\Client_system;
use Modman\Api\V1\Models\System;

class Client_systemController extends ApiController {

    public function index() {
        return $this->respond(Client_system::all());
    }

    public function show(Client_system $client_system){
        return $this->respond($client_system);
    }

    public function store(Request $request){
        $client_system = Client_system::create($request->all());
        return $this->respondCreated($client_system);
    }

    public function destroy(Client_system $client_system){
        $client_system->delete();
        return $this->respondDeleted();
    }

    public function update(Client_system $client_system, Request $request){
        $client_system->update($request->all());
        return $this->respondUpdated($client_system);
    }

}