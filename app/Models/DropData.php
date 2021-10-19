<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DropData extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'dropdown_item',
    ];
}
