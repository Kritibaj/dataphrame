<?php

namespace BPMS;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'note', 'project_id'
    ];
}
