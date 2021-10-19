<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'department',
        'site',
        'HOD_email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function more_info(){
        return $this->hasMany(ExtraInformation::class);
    }

    public function section_one(){
        return $this->hasMany(SectionOne::class);
    }

    public function section_two(){
        return $this->hasMany(SectionTwo::class);
    }

    public function section_three(){
        return $this->hasMany(SectionThree::class);
    }

    public function section_four(){
        return $this->hasMany(SectionFour::class);
    }

    public function section_five(){
        return $this->hasMany(SectionFive::class);
    }

    public function section_six(){
        return $this->hasMany(SectionSix::class);
    }

    public function sig(){
        return $this->hasMany(Signature::class);
    }

}
