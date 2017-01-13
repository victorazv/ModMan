<?php

namespace Modman\Api\V1\Controllers;

use Modman\Api\V1\Controllers\ApiController;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Modman\Api\V1\Models\Cli_sys_mod_func_profile;

class Cli_sys_mod_func_profileController extends ApiController {
    
    public function index() {

        $clientSystem_ModuleFunctionality_Profile = DB::table('cli_sys_mod_func_profile')
            ->select('clients.name AS client', 'systems.name AS system', 'modules.name AS module', 'module_functionalities.functionality', 'profiles.name AS profile', 'cli_sys_mod_func_profile.id_client_system', 'cli_sys_mod_func_profile.id_module_functionality', 'cli_sys_mod_func_profile.id_profile', 'cli_sys_mod_func_profile.id')
            ->join('client_systems', 'cli_sys_mod_func_profile.id_client_system', '=', 'client_systems.id')
            ->join('clients', 'client_systems.id_client', '=', 'clients.id')
            ->join('systems', 'client_systems.id_system', '=', 'systems.id')
            ->join('module_functionalities', 'cli_sys_mod_func_profile.id_module_functionality', '=', 'module_functionalities.id')
            ->join('modules', 'module_functionalities.id_module', '=', 'modules.id')
            ->join('profiles', 'cli_sys_mod_func_profile.id_profile', '=', 'profiles.id')
            ->orderBy('modules.name', 'asc')
            ->get();//Passar para o model
        return response()->json($clientSystem_ModuleFunctionality_Profile, 200);
    }

    public function show(Cli_sys_mod_func_profile $cli_sys_mod_func_profile){
        return $this->respond($cli_sys_mod_func_profile);
    }

    public function store(Request $request){

        $clientSystem_moduleFunctionality_profile = Cli_sys_mod_func_profile::create($request->all());
        return $this->respondCreated($clientSystem_moduleFunctionality_profile);
    }

    public function destroy(Cli_sys_mod_func_profile $clientSystem_ModuleFunctionality_Profile){
        $clientSystem_ModuleFunctionality_Profile->delete();
        return $this->respondDeleted();
    }

    public function update(Cli_sys_mod_func_profile $clientSystem_ModuleFunctionality_Profile, Request $request){
        $clientSystem_ModuleFunctionality_Profile->update($request->all());
        return $this->respondUpdated($clientSystem_ModuleFunctionality_Profile);
    }
}