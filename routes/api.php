<?php

Route::resource('module', 'ModuleController', ["except" => "edit"]);
