<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    //
    protected $table ='details';
    protected $fillable = ['order_id','product_id'];
    public function orders()
    {
    	return $this->belongsTo(Order::class);
    }
    public function products()
    {
    	return $this->hasMany(Products::class);
    }
}
