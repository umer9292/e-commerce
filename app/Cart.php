<?php

namespace App;

class Cart
{
    private $contents;
    private $totalQty;
    private $totalPrice;
    private $totalWeight;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->contents = $oldCart->contents;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalWeight = $oldCart->totalWeight;
        }
    }

    public function addProduct($product, $qty)
    {
        $products = ['qty' => 0, 'price' => $product->price, 'weight' => $product->weight, 'product' => $product];
        if ($this->contents) {
            if (array_key_exists($product->id, $this->contents)) {
                $products = $this->contents[$product->id];
            }
        }

        $products['qty'] += $qty;
        $products['price'] = $product->price * $products['qty'];
        $products['weight'] += $product->weight;
        $this->contents[$product->id] = $products;
        $this->totalQty += $qty;
        $this->totalPrice += $product->price;
        $this->totalWeight += $product->weight;
    }

    public function removeProduct($product)
    {
        if ($this->contents) {
            if (array_key_exists($product->id, $this->contents)) {
                $rProducts = $this->contents[$product->id];
                $this->totalQty -= $rProducts['qty'];
                $this->totalPrice -= $rProducts['price'];
                $this->totalWeight -= $rProducts['weight'];
                array_forget($this->contents, $product->id);
            }
        }
    }

    public function updateProduct($product, $qty)
    {
        if ($this->contents) {
            if (array_key_exists($product->id, $this->contents)) {
                $products = $this->contents[$product->id];
            }
        }

        $this->totalQty -= $products['qty'];
        $this->totalPrice -= $products['price'];
        $this->totalWeight -= $products['weight'];
        $products['qty'] = $qty;
        $products['price'] = $product->price * $products['qty'];
        $products['weight'] = $product->weight;
        $this->totalPrice += $products['price'];
        $this->totalWeight += $products['weight'];
        $this->totalQty += $qty;
        $this->contents[$product->id] = $products;
    }

    /**
     * @return mixed
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * @return mixed
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * @return mixed
     */
    public function getTotalQty()
    {
        return $this->totalQty;
    }

    /**
     * @return mixed
     */
    public function getTotalWeight()
    {
        return $this->totalWeight;
    }
}
