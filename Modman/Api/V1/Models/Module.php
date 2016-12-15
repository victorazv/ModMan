<?php

namespace Modman\Api\V1\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['name', 'description', 'id_system'];   
}