<?php

//Rotas públicas
Route::post('/authenticate', 'Auth\AuthController@authenticate');

// Rotas protegidas
Route::group(['middleware' => ['cors', 'jwt.auth']], function(){

    Route::resource('user', 'UserController');

    Route::resource('module', 'ModuleController');

    Route::resource('system', 'SystemController');

    Route::resource('client', 'ClientController');

    Route::resource('client_system', 'Client_systemController');

    Route::resource('profile', 'ProfileController');

    Route::resource('system_module', 'System_moduleController');

    Route::resource('module_functionality', 'Module_functionalityController');

    Route::resource('cli_sys_mod_func_profile', 'Cli_sys_mod_func_profileController');


    Route::get('teste', function(){
        $client = Modman\Api\V1\Models\Client::find(1);
        $sistema1 = $client->systems()->where('systems.id', 1)->first();
        $module = $sistema1->modules()->where('modules.id', 1)->first();
        return dd($module->features);
    });

});

//Como retirar o create? testei e nao saiu da lista
//Posso apagar uma migration direto no arquivo ?
//Route::resource('module', 'ModuleController', ["except" => "edit"]);