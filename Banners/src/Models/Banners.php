<?php

namespace  Pondit\PonditCommerce\Banners\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banners extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   =   'banners';
    protected $guarded =   [];

}