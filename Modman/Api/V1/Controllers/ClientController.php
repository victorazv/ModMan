<?php

namespace Modman\Api\V1\Controllers;

use Modman\Api\V1\Controllers\ApiController;

use Illuminate\Http\Request;
use Modman\Api\V1\Models\Client;

class ClientController extends ApiController {

    public function index() {
        $user = \Tymon\JWTAuth\Facades\JWTAuth::parseToken()->authenticate();
        return $this->respond(Client::where('id_users', $user->id)->get());
    }

    public function show(Client $client){
        return $this->respond($client);
    }

    public function store(Request $request){
        $user = \Tymon\JWTAuth\Facades\JWTAuth::parseToken()->authenticate();
        $request->request->add(['id_users' => $user->id]);

        $client= Client::create($request->all());
        return $this->respondCreated($client);
    }

    public function destroy(Client $client){
        $client->delete();
        return $this->respondDeleted();
    }

    public function update(Client $client, Request $request){
        //client->update($request->all());
        
        $client->fill($request->all());
        $client->save();
        return $this->respondUpdated($client);
    }

}