<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "command";
    protected $primarykey = "id";
    protected $fillable = [
        'num_command', 'nbre_product','total_price'
    ];
}
