<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionOnePartB extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_one_id',
        'Objective',
        'status',
        'E_comments',
        'S_comments',
    ];
}
