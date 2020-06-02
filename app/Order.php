<?php

namespace App;

use App\OrderStatus;
use App\OrderItem;
use App\Customer;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Order extends Model
{
    use Sortable;

    protected $table = 'orders';
    protected $guarded = [];

    public $sortable = ['country', 'total', 'weight', 'status'];


    public function orderStatus()
    {
        return $this->hasOne('App\OrderStatus', 'id', 'status_id');
    }

    public function orderItem()
    {
        return $this->hasMany('App\OrderItem');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
