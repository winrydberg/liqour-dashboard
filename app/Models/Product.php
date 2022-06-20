<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    // protected $fillable = ['status'];

    public function brands(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function product_categories(){
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function setImagesAttribute($value){
        $this->attributes['images'] = json_encode([$value]);
    }

    public function getImagesAttribute($value){
        return json_decode($value);
    }
}