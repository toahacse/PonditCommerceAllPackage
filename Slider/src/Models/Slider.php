<?php

namespace  Pondit\PonditCommerce\Slider\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Pondit\PonditCommerce\Category\Models\Category;

class Slider extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   =   'sliders';
    protected $guarded =   [];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}