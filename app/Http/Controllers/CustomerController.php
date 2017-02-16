<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use App\Order;
use App\OrderDetails;
use App\Item;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::paginate(3);
       // $customers = Customer::all();
        return view('customers.customers')->withCustomers($customers);


     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customers = new Customer;

        $customers ->last_name = $request-> last_name;
        $customers ->first_name = $request-> first_name;
        $customers ->address = $request-> address;

        $customers->save();


        return redirect()->route('customers.index');
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
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->where('customers.id', '=', $id)
            ->select('orders.id AS order_id', 'orders.order_date', 'customers.id', 'customers.last_name', 'customers.first_name')
            ->get();
 
        return view('customers.customer_order')->withCustomers($customers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       /* $customers = Customer::find($id);
        return*/
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
        $customer = Customer::find($request->id);
        $customer->last_name = $request->lname;
        $customer->first_name = $request->fname;
        $customer->address = $request->address; 
        $customer->save();
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        customer::destroy($id);
        return redirect()->route('customers.index');
    }
}
