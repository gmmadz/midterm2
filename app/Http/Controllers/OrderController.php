<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use App\Order;
use App\OrderDetails;
use App\Item;



class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $customer = Customer::all();
        $fullname = Customer::get()->pluck('full_name', 'id');

        $item= Item::all();
        $itemname = Item::get()->pluck('item_name', 'id');
        return view('orders.orders')->withItems($item)->withItemname($itemname)->withFullname($fullname);
        
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order;

        $order->customer_id = $request->customer_id;
        $order->order_date = $request->order_date;

        $order->save();

      for($i=0; $i < sizeof($request->item_id); $i++){
            $item = Item::find($request->item_id[$i]);
            $item->quantity = $item->quantity - $request->quantity[$i];
            $item->save();

            $order_details = new OrderDetails;
            $order_details->orders_id = $order->id;
            $order_details->items_id = $request->item_id[$i];
            $order_details->quantity = $request->quantity[$i];

            $order_details->save();
        }

        return redirect()->route('orders.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

         $customers = DB::table('orders')
            ->join('order_details', 'orders.id', '=', 'order_details.orders_id')
            ->join('items', 'items.id', '=', 'order_details.items_id')
            ->where('orders.id', '=', $id)
            ->select('order_details.orders_id', 'order_details.quantity', 'items.item_name')
            ->get();


        return view('orders.order_details')->withCustomers($customers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
