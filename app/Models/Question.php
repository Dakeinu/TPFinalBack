<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['quiz_id', 'label', 'answer', 'earnings'];

    public function quiz(){
        return $this->belongsTo('Quiz');
    }

    public function choices(){
        return $this->hasMany('Choice');
    }
}
