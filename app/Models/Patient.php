<?php

namespace App\Models;

use App\Enumerat\Gender;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'address',
        'age',
        'gender',
        'phone',
        'user_id',
        'deleted_at',
        'file_number',
    ];


    // public function gender(): Attribute
    // {
    //     return Attribute::make(
    //         // set: fn ($value) => $value == Gender::MAlE,
    //         get: fn ($value) => $value  ? Gender::MAlE->value : Gender::FEMALE,
    //     );
    // }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function doctors(): BelongsToMany
    {
        return $this->belongsToMany(Doctor::class, 'doctor_patients')
            ->withPivot(['code', 'note'])
            ->withTimestamps();
    }
}
