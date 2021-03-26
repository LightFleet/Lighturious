<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [ 'sku', 'description', 'CPT', 'JHB', 'DBN', 'totalStock', 'dealerPrice', 'detailPrice', 'manufacturer', 'imageUrl' ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function parent()
    {
        return $this->belongsTo(Product::class,'parent_id')->where('parent_id',0);
    }

    public function children()
    {
        return $this->hasMany(Product::class,'parent_id');
    }
}
