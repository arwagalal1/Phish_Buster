<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'path',
        'sub_path',
        'folder_url',
        'status',
        'started_at',
        'completed_at',
        'score',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}