<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreProduct;
use App\Product;
use App\ProductImage;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('productImage')
                        ->orderByDesc('id')
                        ->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        try {
            if($request->hasFile('product_image')) {
                $fileName = time().$request->product_image->getClientOriginalName();
                $path = $request->product_image->storeAs('images', $fileName);
            }
            $newProduct = [
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'price' => $request->price,
                'category_id' => $request->category_id,
                'discount' => ($request->discount) ? $request->discount : 0,
                'weight' => ($request->weight) ? $request->weight : 0,
            ];

            DB::beginTransaction();

            $product = Product::create($newProduct);
            $productImage = ProductImage::create(['product_id' => $product->id, 'file_name' => $path]);

            if  ( $product && $productImage ) {
                DB::commit();
                return back()->with('success', 'Product Added Successfully!');
            } else {
                DB::rollBack();
                return back()->with('error', 'Invalid Activity');
            }

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $productImage = ProductImage::first();
        return view('admin.products.single', compact('product', 'productImage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $productImage = ProductImage::first();
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'productImage', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        try {
            $product->title = $request->title;
            $product->description = $request->description;
            $product->status = $request->status;
            $product->price = $request->price;
            $product->category_id = $request->category_id;
            $product->discount = ($request->discount) ? $request->discount : 0;
            $product->weight = ($request->weight) ? $request->weight : 0;

            if  ($product->save() ) {
                if($request->hasFile('product_image')) {
                    $fileName = time().$request->product_image->getClientOriginalName();
                    $path = $request->product_image->storeAs('images', $fileName);
                    ProductImage::where('product_id', $product->id)->update(['file_name' =>  $path]);
                }
                return redirect()->route('product.index')->with('success', 'Product Update Successfully!');
            } else {
                return back()->with('error', 'Invalid Activity');
            }

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function createPdf()
    {
        $products = Product::all();
        $fileName = 'product-pdf'.now()->toDateTimeString().'.pdf';
        $pdf = PDF::loadView('admin.products.product-pdf', compact('products'));
        $pdf->save(public_path().DIRECTORY_SEPARATOR.'product-pdf');
        return $pdf->download($fileName);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $productImage = ProductImage::where('product_id', '=', $product->id)->first();
        if ($product->forceDelete()) {
            Storage::delete($productImage->file_name);
            $productImage->delete();
            return redirect()->route('product.index')->with('success', 'Product Successfully Removed');
        } else {
            return back()->with('error', 'Error In Removing Product');
        }
    }
}
