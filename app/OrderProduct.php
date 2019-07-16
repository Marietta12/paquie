<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "order_product";
    protected $primarykey = "id";
    protected $fillable = [
        'order_id', 'product_id','quantity','price','sous_total'
    ];
}
