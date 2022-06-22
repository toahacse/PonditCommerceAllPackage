<?php

namespace  Pondit\PonditCommerce\Order\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Pondit\PonditCommerce\Product\Models\Product;
use Pondit\PonditCommerce\UserInformation\Models\UserInformation;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   =   'orders';
    protected $guarded =   [];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function user_info(){
        return $this->belongsTo(UserInformation::class);
    }


}