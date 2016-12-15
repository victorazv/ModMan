<?php

namespace Modman\Api\V1\Controllers;

use Modman\Api\V1\Controllers\ApiController;

use Modman\Api\V1\Models\System_module;
use Illuminate\Http\Request;

class System_moduleController extends ApiController {

    public function index() {
        return $this->respond(System_module::all());
    }

    public function show(System_module $system_module){
        return $this->respond($system_module);
    }

    public function store(Request $request){
        $system_module = System_module::create($request->all());
        return $this->respondCreated($system_module);
    }

    public function destroy(System_module $system_module){
        $system_module->delete();
        return $this->respondDeleted();
    }

    public function update(System_module $system_module, Request $request){
        $system_module->update($request->all());
        return $this->respondUpdated($system_module);
    }

}