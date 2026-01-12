<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorPatients extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'note'
    ];
}
