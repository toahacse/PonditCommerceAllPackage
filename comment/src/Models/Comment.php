<?php

namespace Comment\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public static function rules($id = '') 
    {
        return [
            'description' => 'required|max:250',
            'reply' => 'required|max:250'
        ];
    }
}
