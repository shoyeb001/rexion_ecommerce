<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{ 
    use HasFactory;

    public $table = 'sub_categories';
  

       protected $fillable = [
        'category_id',
        'subcategory_name',
        'subcategory_slug',
    ];

    public function category(){
    	return $this->belongsTo(Category::class,'category_id','id');
    }
}
