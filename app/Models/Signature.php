<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'extra_info',
        'employee',
        'supervisor',
        'hod',
        'employee_date',
        'supervisor_date',
        'hod_date',
    ];
}
