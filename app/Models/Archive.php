<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_id',
        'category_id',
        'user_id',
        'archive_name',
        'description',
        'file',
        'completeness_status',
        'additional_info',
    ];

    public static function getArchiveByUnit(String $unit_id) {
        $archive = Archive::where('unit_id', $unit_id)->get();
        return $archive;
    }

    public static function getArchiveById(String $id) {
        $archive = Archive::where('id', $id)->get()->first();
        return $archive;
    }


    //Has Many
    
    public function Files()
    {
        return $this->hasMany(Files::class, 'archive_id', 'id');
    }

    public function DeleteRequest()
    {
        return $this->hasOne(DeleteRequest::class, 'archive_id', 'id');
    }

    // Belongs To

    public function Unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
