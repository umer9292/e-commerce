<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        try {
            $cart = [];
            $order = [];
            if (Session::has('cart')) {
                $cart = Session::get('cart');
            }

            $customerData = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'address_1' => $request->address_1,
                'address_2' => $request->address_2,
                'country' => $request->country,
                'state' => $request->state,
                'zip_code' => $request->zip_code,
            ];

            DB::beginTransaction();
            $customer = Customer::create($customerData);

            $orderData = [
                'customer_id' => $customer->id,
                'price' => $cart->getTotalPrice(),
                'weight' => $cart->getTotalWeight(),
                'total_items' => 3,
                'status_id' => 1,
                'delivered_at' => null,
            ];

            $order = Order::create($orderData);

            foreach ($cart->getContents() as $product) {
                $orderItemsData = [
                    'order_id' => $order->id,
                    'product_id' => $product['product']->id,
                    'quantity' => $product['qty'],
                    'price' => $product['price'],
                    'weight' => $product['weight'],
                ];

                $orderItems[] = OrderItem::create($orderItemsData);
            }

//            dd($customer, $order, $orderItems);
            if ($customer && $order && $orderItems){
                DB::commit();
                Session::unset();
                return redirect('/');
            } else {
                DB::rollBack();
                return redirect('checkout')->with('error', 'Invalid Activity');
            }
        } catch (\Exception $e){
            dd($e->getMessage());
        }
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
