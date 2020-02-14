<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $casts = [
        "adult" => "boolean"
    ];

    protected $fillable = [
        "title", "description","adult"
    ];
}
