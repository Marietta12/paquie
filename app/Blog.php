<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
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

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
