<?php

namespace  Pondit\PonditCommerce\Label\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Label extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   =   'labels';
    protected $guarded =   [];

}