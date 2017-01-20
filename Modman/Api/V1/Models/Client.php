<?php

namespace Modman\Api\V1\Models;

use Illuminate\Database\Eloquent\Model;
use Modman\Api\V1\Models\System;

class Client extends Model
{
    protected $fillable = ['name', 'phone', 'id_users'];

    public function systems(){
        return $this->belongsToMany(System::class, 'client_systems', 'id_client', 'id_system');
    }
}