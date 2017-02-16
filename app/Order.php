<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

	protected $fillable = ['customer_id', 'order_date'];

    public function customers(){
    	return $this->belongsTo('App\Customer');
    }

    public function orderdetails(){
    	return $this->hasMany('App\OrderDetails');
    }
     
}
