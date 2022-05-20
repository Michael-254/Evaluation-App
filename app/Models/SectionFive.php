<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionFive extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'extra_info',
        'proposed_objective',
        'department_linked',
        'objective_measurement',
        'steps_to_achieve',
        'completion_date',
    ];
}
