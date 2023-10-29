<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QrCode extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'value',
        'type',
        'link',
        'metadata',
    ];

    protected $casts = [
        'metadata' => 'array',
    ];
}
