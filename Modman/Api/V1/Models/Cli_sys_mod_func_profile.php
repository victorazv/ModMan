<?php

namespace Modman\Api\V1\Models;

use Illuminate\Database\Eloquent\Model;

class Cli_sys_mod_func_profile extends Model
{
    protected $table = 'cli_sys_mod_func_profile';
    protected $fillable = ['id_client_system', 'id_module_functionality', 'id_profile'];
}
