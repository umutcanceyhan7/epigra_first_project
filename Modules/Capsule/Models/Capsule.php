<?php

namespace Epigra\Capsule\Models;

use Illuminate\Database\Eloquent\Model;

class Capsule extends Model
{
    protected $fillable = [
        'capsule_serial',
        'capsule_id',
        'status',
        'original_launch',
        'original_launch_unix',
        'missions',
        'landings',
        'type',
        'details',
        'reuse_count',
    ];
}
