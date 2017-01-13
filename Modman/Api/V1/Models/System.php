<?php

namespace Modman\Api\V1\Models;

use Illuminate\Database\Eloquent\Model;
use Modman\Api\V1\Models\Module;

class System extends Model
{
    protected $fillable = ['name', 'description'];
    
    public function modules(){
        return $this->belongsToMany(Module::class, 'system_modules', 'id_system', 'id_module');
    }
}