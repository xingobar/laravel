<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    
	protected $fillable = ['user_id'];

    public function user()
    {
    	return $this->belongs(User::class);
    }

    public function orderDetails()
    {
    	return $this->hasMany(OrderDetails::class);
    }
}
