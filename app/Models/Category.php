<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function subcategories()
    // {
    //     return $this->hasMany(Subcategory::class, 'subcategory_id');
    // }

    // One Category has many SubCategories
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'subcategory_id', 'id');
    }


}
