<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $guarded = [];

    // SQL Query

    public static function getUnitById($id) {
            $unit = Unit::where('id', $id)->get()->first();
            return $unit;
    }
    // public static function getUnitByCategory(String $unit_id) {
    //     $unit = Unit::where('id', $unit_id)->get();
    //     return $unit;
    // }

    // Has Many

    public function Category()
    {
        return $this->hasMany(Category::class, 'unit_id', 'id');
    }

    public function Archive()
    {
        return $this->hasMany(Archive::class, 'unit_id', 'id');
    }

    public function User()
    {
        return $this->hasMany(User::class, 'unit_id', 'id');
    }
}
