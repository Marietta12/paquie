<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "product";
    protected $primarykey = "id";
    protected $fillable = [
        'title', 'description','prix','photo'
    ];

    public function category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
