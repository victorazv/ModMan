<?php

namespace Modman\Api\V1\Models;

use Illuminate\Database\Eloquent\Model;
use Modman\Api\V1\Models\Module_functionality;

class Module extends Model
{
    protected $fillable = ['name', 'description', 'id_system', 'id_users'];

    public function features (){
        return $this->hasMany(Module_functionality::class, "id_module");
    }
}