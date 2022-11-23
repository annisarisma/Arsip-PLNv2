<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;

    protected $fillable = [
        'archive_id',
        'file_name',
    ];

    protected $touches = ['archive'];

    public static function getFilesByArchive(String $id) {
        $files = Files::where('archive_id', $id)->get();
        return $files;
    }

    //Belongs To

    public function Archive()
    {
        return $this->belongsTo(Archive::class, 'archive_id', 'id');
    }
}
