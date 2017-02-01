<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['item_name', 'quantity'];

   
   /* public function orders(){
    	return $this->hasMany('App\Order');
    }*/
}