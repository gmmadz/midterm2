<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function ordersdetails(){
    	return $this->belongsTo('App\OrderDetails');
    }

     
}
