<?php

//Rotas públicas
Route::post('/authenticate', 'Auth\AuthController@authenticate');

Route::resource('user', 'UserController');

//Route::post('endpoint', 'EndpointController');

Route::post('endpoint', function(){
    $permission = DB::table('systems')
        ->select('clients.name AS client', 'systems.name AS systems', 'modules.name AS module', 'module_functionalities.functionality', 'profiles.name AS profile')
        ->join('client_systems', 'systems.id', '=', 'client_systems.id_system')
        ->join('system_modules', 'systems.id', '=', 'system_modules.id_system')
        ->join('module_functionalities', 'system_modules.id_module', '=', 'module_functionalities.id_module')
        ->join('cli_sys_mod_func_profile', function ($join) {
            $join->on('client_systems.id', '=', 'cli_sys_mod_func_profile.id_client_system')
                ->on('module_functionalities.id', '=', 'cli_sys_mod_func_profile.id_module_functionality');
        })
        ->join('modules', 'system_modules.id_module', '=', 'modules.id')
        ->join('profiles', 'cli_sys_mod_func_profile.id_profile', '=', 'profiles.id')
        ->join('clients', 'client_systems.id_client', '=', 'clients.id')
        ->where('client_systems.key', $_POST['key'])
        ->get();

    return $permission;
});

// Rotas protegidas
Route::group(['middleware' => ['cors', 'jwt.auth']], function(){

    Route::resource('module', 'ModuleController');

    Route::resource('system', 'SystemController');

    Route::resource('client', 'ClientController');

    Route::resource('client_system', 'Client_systemController');

    Route::resource('profile', 'ProfileController');

    Route::resource('system_module', 'System_moduleController');

    Route::resource('module_functionality', 'Module_functionalityController');

    Route::resource('cli_sys_mod_func_profile', 'Cli_sys_mod_func_profileController');

    /*
    Route::get('teste', function(){
        $client = Modman\Api\V1\Models\Client::find(1);
        $sistema1 = $client->systems()->where('systems.id', 1)->first();
        $module = $sistema1->modules()->where('modules.id', 1)->first();
        return dd($module->features);
    });
    */

});

//Como retirar o create? testei e nao saiu da lista
//Posso apagar uma migration direto no arquivo ?
//Route::resource('module', 'ModuleController', ["except" => "edit"]);