<?php

namespace Modman\Api\V1\Controllers;

use Modman\Api\V1\Controllers\ApiController;

use Illuminate\Http\Request;
use Modman\Api\V1\Models\Client;
use Modman\Api\V1\Models\System;

class ClientController extends ApiController {

    public function index() {
        return $this->respond(Client::all());
    }

    public function show(Client $client){
        return $this->respond($client);
    }

    public function store(Request $request){
        $client= Client::create($request->all());
        return $this->respondCreated($client);
    }

    public function destroy(Client $client){
        $client->delete();
        return $this->respondDeleted();
    }

    public function update(Client $client, Request $request){
        $client->update($request->all());
        return $this->respondUpdated($client);
    }

}