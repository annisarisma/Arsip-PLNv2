<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_id',
        'category_name',
    ];

    // SQL Query

    public static function getCategoryByUnit(String $unit) {
        $category = Category::where('unit_id', $unit)->get();
        return $category;
    }

    public static function getCategoryById(String $id) {
        $category = Category::where('id', $id)->get()->first();
        return $category;
    }

    // Has Many

    public function Archive()
    {
        return $this->hasMany(Archive::class, 'category_id', 'id');
    }

    // Belongs To

    public function Unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
}
