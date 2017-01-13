<?php

namespace Modman\Api\V1\Models;

use Illuminate\Database\Eloquent\Model;

class System_module extends Model
{
    protected $table = 'system_modules';
    protected $fillable = ['id_system', 'id_module'];
}