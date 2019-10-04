<?php

namespace BPMS;

use Illuminate\Database\Eloquent\Model;

class JobOrder extends Model
{
    protected $fillable = [
        'job_order_number','quote_number','quote_value','description','scope','hotel_name','address','city','post_code','country','hotel_contact','dat_of_request','po_number','client_pm','invoice_status','task_id','status'
    ];

}
