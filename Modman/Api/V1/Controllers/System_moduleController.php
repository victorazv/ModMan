<?php

namespace Modman\Api\V1\Controllers;

use Modman\Api\V1\Controllers\ApiController;

use Illuminate\Support\Facades\DB;
use Modman\Api\V1\Models\System_module;
use Illuminate\Http\Request;

class System_moduleController extends ApiController {

    public function index() {
        $user = \Tymon\JWTAuth\Facades\JWTAuth::parseToken()->authenticate();
        $system_module = DB::table('system_modules')
            ->select('modules.name AS module', 'systems.name AS system', 'system_modules.id', 'system_modules.id_system', 'system_modules.id_module', 'system_modules.key')
            ->join('modules', 'system_modules.id_module', '=', 'modules.id')
            ->join('systems', 'system_modules.id_system', '=', 'systems.id')
            ->orderBy('systems.name', 'asc')
            ->where('modules.id_users', $user->id)
            ->get();//Passar para o model
        return response()->json($system_module, 200);
    }

    public function show(System_module $system_module){
        return $this->respond($system_module);
    }

    public function store(Request $request){

        $input = $request->all();
        $id_module = $request->id_module;
        $system_module = System_module::create($input)->id;

        $key = 'M' . $system_module . $id_module;

        $system_module = System_module::find($system_module);
        $system_module->key = $key;
        $system_module->save();

        return $this->respondCreated($system_module);

        //$system_module = System_module::create($request->all());
        //return $this->respondCreated($system_module);
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