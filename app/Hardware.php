<?php

namespace BPMS;

use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
    protected $fillable = [
        'hardware','job_order_number','quantity','configuration_status','shipped','delivery_status','publish_status','notes'
    ];
}
