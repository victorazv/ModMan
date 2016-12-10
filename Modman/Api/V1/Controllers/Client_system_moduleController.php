<?php

namespace Modman\Api\V1\Controllers;

use Modman\Api\V1\Controllers\ApiController;

use Illuminate\Http\Request;
use Modman\Api\V1\Models\Client_system_module;

class Client_system_moduleController extends ApiController {

    public function index() {
        return $this->respond(Client_system_module::all());
    }

    public function show(Client_system_module $client_system_module){
        return $this->respond($client_system_module);
    }

    public function store(Request $request){
        $client_system_module = Client_system_module::create($request->all());
        return $this->respondCreated($client_system_module);
    }

    public function destroy(Client_system_module $client_system_module){
        $client_system_module->delete();
        return $this->respondDeleted();
    }

    public function update(Client_system_module $client_system_module, Request $request){
        $client_system_module->update($request->all());
        return $this->respondUpdated($client_system_module);
    }

}