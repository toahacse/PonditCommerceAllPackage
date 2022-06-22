<?php

namespace  Pondit\PonditCommerce\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Pondit\PonditCommerce\Brand\Models\Brand;
use Pondit\PonditCommerce\Category\Models\Category;
use Pondit\PonditCommerce\Label\Models\Label;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   =   'products';
    protected $guarded =   [];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function label(){
        return $this->belongsTo(Label::class);
    }

}