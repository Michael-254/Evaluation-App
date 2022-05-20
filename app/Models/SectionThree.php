<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionThree extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'extra_info',
        'topic',
        'training_required',
        'how_achieved',
        'person_responsible',
    ];
}
