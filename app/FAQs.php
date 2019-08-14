<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQs extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "faqs";
    protected $primarykey = "id";
    protected $fillable = [
        'questions', 'answers'
    ];
}
