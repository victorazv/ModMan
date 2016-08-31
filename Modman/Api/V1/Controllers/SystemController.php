<?php

namespace Modman\Api\V1\Controllers; 

use Modman\Api\V1\Controllers\ApiController;
use Modman\Api\V1\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends ApiController {

    public function index() {
        return $this->respond(Module::all());
    }

    public function show(Module $module){
        return $this->respond($module);
    }

    public function store(Request $request){
        $module = Module::create($request->all());
        return $this->respondCreated($module);
    }

    public function destroy(Module $module){
        $module->delete();
        return $this->respondDeleted();
    }

    public function update(Module $module, Request $request){
        $module->update($request->all());
        return $this->respondUpdated($module);
    }

}