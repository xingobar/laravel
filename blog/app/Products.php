<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    public function orderDetails()
    {
    	return $this->belongsTo(OrderDetails::class);
    }
}
