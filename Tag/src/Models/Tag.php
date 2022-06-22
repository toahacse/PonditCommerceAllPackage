<?php

namespace  Pondit\PonditCommerce\Tag\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   =   'tags';
    protected $guarded =   [];

}