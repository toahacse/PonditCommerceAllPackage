<?php

namespace  Pondit\PonditCommerce\Cart\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   =   'carts';
    protected $guarded =   [];

}