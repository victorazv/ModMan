<?php
Route::group(['middleware' => 'cors'], function(){

Route::resource('module', 'ModuleController');

Route::resource('system', 'SystemController');

Route::resource('client', 'ClientController');

Route::resource('client_system', 'Client_systemController');

//Route::resource('client_system_module', 'Client_system_moduleController');

Route::resource('profile', 'ProfileController');

Route::resource('system_module', 'System_moduleController');

Route::resource('module_functionality', 'Module_functionalityController');

});

//Como retirar o create? testei e nao saiu da lista
//Posso apagar uma migration direto no arquivo ?
//Route::resource('module', 'ModuleController', ["except" => "edit"]);