<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // this is allow us to fill the name attribute when using Eloquent's create method
    protected $fillable = ['name'];


    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
