<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'birthday',
        'address',
        'age',
        'degree',
        'major',
        'email',
        'status',
        'description',
        'image',
    ];
}
