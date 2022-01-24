<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = ['published', 'label'];

    public function score(){
        return $this->hasMany(Score::class);
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }
}
