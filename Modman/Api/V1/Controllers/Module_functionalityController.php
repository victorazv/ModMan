<?php

namespace Modman\Api\V1\Controllers;

use Modman\Api\V1\Controllers\ApiController;

use Illuminate\Support\Facades\DB;
use Modman\Api\V1\Models\Module_functionality;
use Illuminate\Http\Request;

class Module_functionalityController extends ApiController {

    public function index() {
        $user = \Tymon\JWTAuth\Facades\JWTAuth::parseToken()->authenticate();
        $system_module = DB::table('module_functionalities')
            ->select('module_functionalities.functionality', 'modules.name AS module', 'module_functionalities.id', 'module_functionalities.id_module')
            ->join('modules', 'module_functionalities.id_module', '=', 'modules.id')
            ->orderBy('modules.name', 'asc')
            ->where('modules.id_users', $user->id)
            ->get();//Passar para o model
        return response()->json($system_module, 200);
    }

    public function show(Module_functionality $module_functionality){
        return $this->respond($module_functionality);
    }

    public function store(Request $request){
        $user = \Tymon\JWTAuth\Facades\JWTAuth::parseToken()->authenticate();
        $request->request->add(['id_users' => $user->id]);

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