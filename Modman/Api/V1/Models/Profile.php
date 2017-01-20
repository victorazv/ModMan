<?php

namespace Modman\Api\V1\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'id_users'];
}