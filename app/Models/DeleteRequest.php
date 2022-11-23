<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeleteRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'archive_id',
        'user_id'
    ];

    public function Archive() {
        return $this->belongsTo(Archive::class, 'archive_id', 'id');
    }

    public function User() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
