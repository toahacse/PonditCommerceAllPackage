<?php

namespace  Pondit\PonditCommerce\UserInformation\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserInformation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   =   'user_informations';
    protected $guarded =   [];

}