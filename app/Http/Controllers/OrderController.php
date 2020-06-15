<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderItem;
use App\OrderStatus;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

    public function updateStatusHandler($orderId, $statusId)
    {
        try{
            $response['success'] = false;
            $getOrder = Order::find($orderId);
            if ($getOrder) {
                $getOrder->update(['status_id' => $statusId]);
                $response['success'] = true;
            }
        } catch (\Exception $e) {
            Log::error($orderId. ' Unable to update order state!!');
        }
        return response($response,  $response['success'] ? 200 : 400)
            ->header('Content-type', 'application/json');
    }

    public function updateDeliveryAddress(Request $request)
    {
        try{
            $response['success'] = false;
            $orderId = $request->order_id;
            $customerId = $request->customer_id;
            $getCustomer = Customer::where('id', '=', $customerId)->first();
            if ($getCustomer) {
                $addressOne = $request->address_1;
                $addressTwo = $request->address_2;
                $getCustomer->update([
                    'address_1' => $addressOne,
                    'address_2' => $addressTwo
                ]);
                $response['success'] = true;
            }
        } catch (\Exception $e) {
            Log::error($orderId. $customerId . ' Unable to update delivery address!!');
        }
        return response($response,  $response['success'] ? 200 : 400)
            ->header('Content-type', 'application/json');
    }

    public function updateCustomer(Request $request)
    {
        try{
            $response['success'] = false;
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
                $response['success'] = true;
            }
        } catch (\Exception $e) {
            Log::error($orderId. $customerId . ' Unable to update customer email & phone!!');
        }
        return response($response,  $response['success'] ? 200 : 400)
            ->header('Content-type', 'application/json');
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
