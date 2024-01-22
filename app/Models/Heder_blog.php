<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Heder_blog extends Model
{
       
    protected $guarded = [];
    
    public function category(){
        return $this->belongsTo(BlogCategory::class,'blog_category_id','id');
    }
    use HasFactory;
}
