<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Customer;
use App\Order;
use App\OrderItem;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Webpatser\Countries\Countries;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('productImage')
            ->orderByDesc('id')
            ->paginate(10);
        return view('products.all', compact('products'));
    }

    public function single(Product $product)
    {
        $productImage = ProductImage::where('product_id', $product->id)->first();
        return view('products.single', compact('product', 'productImage'));
    }

    public function addToCart(Request $request, Product $product)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $qty = $request->qty ? $request->qty : 1;
        $cart = new Cart($oldCart);
        $cart->addProduct($product, $qty);
        Session::put('cart', $cart);
        return back()->with('success', "Success - Product $product->title has been successfully added to Cart");
    }

    public function updateCart(Request $request, Product $product)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        if ($request->qty > 0)
            $cart->updateProduct($product, $request->qty);
        else
            $cart->removeProduct($product);
        Session::put('cart', $cart);
        return back()->with('success', "Success - Product $product->title has been successfully updated to Cart");
    }

    public function removeProduct(Product $product)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeProduct($product);
        Session::put('cart', $cart);
        return back()->with('success', "Success - Product $product->title has been successfully remove from the Cart");
    }

    public function cart()
    {
        if (!Session::has('cart')) {
            return view('products.cart');
        }

        $cart = Session::get('cart');
        return view('products.cart', compact('cart'));
    }

    public function checkout()
    {
        if (!Session::has('cart') || empty(Session::get('cart')->getContents())) {
            return redirect('/')->with('info', 'Info - No Products in the Cart');
        }

        $countries = Countries::all();
        $cart = Session::get('cart');
        return view('products.checkout', compact('cart', 'countries'));
    }

    public function storeCheckout(Request $request)
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
                Session::forget('cart');
                return redirect('/');
            } else {
                DB::rollBack();
                return redirect('checkout')->with('error', 'Invalid Activity');
            }
        } catch (\Exception $e){
            dd($e->getMessage());
        }
    }

}
