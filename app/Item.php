<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function orders(){
    	return $this->hasMany('App\OrderDetails');
    }

     protected $fillable = ['item_id', 'quantity'];
}
