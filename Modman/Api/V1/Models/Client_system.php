<?php

namespace Modman\Api\V1\Models;

use Illuminate\Database\Eloquent\Model;

class Client_system extends Model
{
    protected $fillable = ['id_client', 'id_system', 'paid'];
}
