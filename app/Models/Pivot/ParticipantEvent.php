<?php

namespace App\Models\Pivot;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParticipantEvent extends Model
{
    use SoftDeletes;

    protected $table = 'participant_events';

    protected $fillable = [
        'participant_id',
        'event_id',
    ];
}
