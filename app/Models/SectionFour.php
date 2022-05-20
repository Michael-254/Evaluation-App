<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionFour extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'extra_info',
        'sup_works_well',
        'sup_needs_improvement',
        'org_works_well',
        'org_needs_improvement',
    ];
}
