<?php

Route::resource('module', 'ModuleController', ["except" => "edit"]);

Route::resource('system', 'SystemController', ["except" => "edit"]);

Route::resource('client', 'ClientController', ["except" => "edit"]);

Route::resource('client_system', 'Client_systemController', ["except" => "edit"]);

//Como retirar o create? testei e nao saiu da lista
//Posso apagar uma migration direto no arquivo ?