<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionTwo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'extra_info',
        'Competence_id',
        'Employee_level',
        'Supervisor_level',
        'Comments',
    ];

    public function comp(){
        return $this->belongsTo(Competence::class,'Competence_id');
    }
}
