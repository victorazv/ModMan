<?php

namespace Modman\Api\V1\Controllers;

use Modman\Api\V1\Controllers\ApiController;

use Modman\Api\V1\Models\Module_functionality;
use Illuminate\Http\Request;

class Module_functionalityController extends ApiController {

    public function index() {
        return $this->respond(Module_functionality::all());
    }

    public function show(Module_functionality $module_functionality){
        return $this->respond($module_functionality);
    }

    public function store(Request $request){
        $module_functionality = Module_functionality::create($request->all());
        return $this->respondCreated($module_functionality);
    }

    public function destroy(Module_functionality $module_functionality){
        $module_functionality->delete();
        return $this->respondDeleted();
    }

    public function update(Module_functionality $module_functionality, Request $request){
        $module_functionality->update($request->all());
        return $this->respondUpdated($module_functionality);
    }

}