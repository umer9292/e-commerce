<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        return view('products.cart', compact('cart', 'productImage'));
    }

    public function checkout()
    {
        if (!Session::has('cart') || empty(Session::get('cart')->getContents())) {
            return redirect('/')->with('info', 'Info - No Products in the Cart');
        }
        $cart = Session::get('cart');
        return view('products.checkout', compact('cart'));
    }

}
