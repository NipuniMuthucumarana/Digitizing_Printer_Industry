<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
    protected $fillable = ['order_id', 'document_needed', 'quantity','area','order_status'];
}
