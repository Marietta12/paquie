<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "blog";
    protected $primarykey = "id";
    protected $fillable = [
        'title', 'description','photo'
    ];
}
