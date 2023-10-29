<?php

namespace App\Models\Webhook;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Webhook extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'route',
        'route_name',
        'description',
    ];
}
