<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $fillable = ['order_id', 'name', 'quantity'];

    public function orders(){
    	return $this->bleongsTo('App\Order');
    }

    public function items(){
    	return $this->hasMany('App\Item');
    }
}
