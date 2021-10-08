<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'Academic',
        'Designation',
        'service_years',
        'review_supervisor',
        'review_period',
        'last_appraisal',
    ];

    public function supervisor()
    {
        return $this->belongsTo(User::class, 'review_supervisor');
    }
}
