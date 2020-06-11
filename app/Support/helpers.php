<?php

use Carbon\Carbon;


function diff4Human ($date) {
    return is_null($date) ? 'N/A' : Carbon::parse($date)->diffForHumans();
}

#   get only date from create_at(datetime)
function getOnlyDate ($date) {
    return is_null($date) ? 'N/A' : Carbon::parse($date)->toDateString();
}

function getProductImage ($productId) {
    return \App\ProductImage::where('product_id', '=', $productId)->first();
}

function myCart(){
    return new \App\Cart(\Session::get('cart'));
}
