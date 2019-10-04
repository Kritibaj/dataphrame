<?php

namespace BPMS;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
     protected $fillable = [
        'job_order_number', 'user_id', 'role','type','status'
    ];
}
