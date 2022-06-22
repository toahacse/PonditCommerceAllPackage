<?php

namespace  Pondit\PonditCommerce\ProductTag\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Pondit\PonditCommerce\Product\Models\Product;
use Pondit\PonditCommerce\Tag\Models\Tag;

class ProductTag extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   =   'product_tags';
    protected $guarded =   [];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function tag(){
        return $this->belongsTo(Tag::class);
    }


}