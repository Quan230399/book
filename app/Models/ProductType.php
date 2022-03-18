<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;

    protected $table = "type_product";

    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class,'id_type', 'id');
    }

    public function menuType()
    {
        return $this->belongsTo(Menu::class,'id_menu', 'id');
    }

}
