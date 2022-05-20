<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionOne extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'extra_info',
        'q_oneA',
        'q_oneB',
        'q_oneC',
        'q_three',
        'q_four',
        'q_five',
        'q_six',
    ];

    public function partB(){
        return $this->hasMany(SectionOnePartB::class);
    }
}
