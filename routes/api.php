<?php

Route::resource('module', 'ModuleController', ["except" => "edit"]);

Route::resource('system', 'SystemController', ["except" => "edit"]);

//Como retirar o create? testei e nao saiu da lista
//Verificar a dependência da FK no método down
//nao vi fk no workbench