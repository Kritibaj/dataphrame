<?php

namespace BPMS;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name','ClientOrganization','country','region','address','OtherInformation'
    ];
}
