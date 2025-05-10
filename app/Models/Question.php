<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['path', 'sub_path', 'text', 'audio_url'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}