<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use App\Product;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function updateOrderItem(Request $request)
    {
        try{
            $orderId = $request->order_id;
            $itemId = $request->id;

            $getItem = OrderItem::where([
                ['id', '=', $itemId],
                ['order_id', '=', $orderId]
            ])->first();

            if ($getItem) {

                $oldWeight = $getItem->weight;
                $oldPrice = $getItem->price;

                $getProduct = $getItem->product();
                $qty = $request->quantity;
                $newWeight = $getProduct->weight * $qty;
                $newPrice = $getProduct->price * $qty;

                $getItem->update([
                    'quantity' => $qty,
                    'price' => $newPrice,
                    'weight' => $newWeight
                ]);

                $getOrder = Order::find($orderId);
                $getOrder->update([
                    'weight' => $getOrder->weight - $oldWeight + $newWeight,
                    'price' => $getOrder->price - $oldPrice + $newPrice,
                ]);

                return back()->with('success', 'Order Item successfully Updated.');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return back()->with('error', 'Unable to update Order item!!');

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function show(OrderItem $orderItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderItem $orderItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderItem $orderItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderItem $orderItem)
    {
        //
    }
}
