<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'evaluation_type',
        'Academic',
        'Designation',
        'service_years',
        'review_supervisor',
        'review_hod',
        'review_period',
        'last_appraisal',
    ];

    public function supervisor()
    {
        return $this->belongsTo(User::class, 'review_supervisor')->withDefault();
    }

    public function myHod()
    {
        return $this->belongsTo(User::class, 'review_hod');
    }

    public function sectionOne(){
        return $this->hasOne(SectionOne::class,'extra_info')->withDefault();
    }

    public function items()
    {
        return $this->hasManyThrough(SectionOnePartB::class, SectionOne::class);
    }

    public function sectionTwo(){
        return $this->hasMany(SectionTwo::class,'extra_info');
    }

    public function sectionThree(){
        return $this->hasMany(SectionThree::class,'extra_info');
    }

    public function sectionFour(){
        return $this->hasOne(SectionFour::class,'extra_info')->withDefault();
    }

    public function sectionFive(){
        return $this->hasMany(SectionFive::class,'extra_info');
    }

    public function sectionSix(){
        return $this->hasOne(SectionSix::class,'extra_info')->withDefault();
    }
}
