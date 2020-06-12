<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderItem;
use App\OrderStatus;
use Illuminate\Http\Request;
use Webpatser\Countries\Countries;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderStatus = OrderStatus::all();
        $countries = Countries::all();

        $orders = Order::with(['customer', 'orderStatus', 'orderItems'])
                    ->sortable(['id' => 'desc'])
                    ->paginate(20);
        return view('admin.orders.list',
            compact('orders',
            'orderStatus',
            'countries'
            ));
    }

    public function updateStatusHandler($orderId, $selectedStatus)
    {
        dd($orderId, $selectedStatus);
    }

    public function updateDeliveryAddress(Request $request)
    {
        try{
            $orderId = $request->order_id;
            $customerId = $request->customer_id;

            $getDeliveryAddress = Customer::where('id', '=', $customerId)->first();

            if ($getDeliveryAddress) {
                $addressOne = $request->address_1;
                $addressTwo = $request->address_2;
                $getDeliveryAddress->update([
                    'address_1' => $addressOne,
                    'address_2' => $addressTwo
                ]);
                return back()->with('success', 'Delivery address successfully Updated.');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return back()->with('error', 'Unable to update Order Delivery address!!');
    }

    public function updateCustomer(Request $request)
    {
        try{
            $orderId = $request->order_id;
            $customerId = $request->customer_id;

            $getCustomer = Customer::where('id', '=', $customerId)->first();

            if ($getCustomer) {
                $email = $request->email;
                $phone = $request->phone;
                $getCustomer->update([
                    'email' => $email,
                    'phone' => $phone
                ]);
                return back()->with('success', 'Customer successfully Updated.');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return back()->with('error', 'Unable to update Customer!!');
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
