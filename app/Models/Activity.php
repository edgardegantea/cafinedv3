<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /** @use HasFactory<\Database\Factories\ActivityFactory> */
    use HasFactory;

    protected $fillable = [
        'instructor_id',
        'image_path',
        'name',
        'excerpt',
        'description',
        'start_time',
        'end_time',
        'duration',
        'location',
        'address',
        'meeting_link',
        'materials',
        'prerequisites',
        'target_audience',
        'language',
        'syllabus_url',
        'contact_email',
        'contact_phone',
        'qr_code_link',
        'capacity',
        'price',
        'type',
        'syllabus',
        'modules',
        'credits',
        'frequency',
        'methodology',
        'status',
        'is_active',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function instructor()
    {
        return $this->belongsTo(User::class);
    }

    public function enrollments()
    {
        return $this->morphMany(Enrollment::class, 'enrollable');
    }

    public function users()
    {
        return $this->morphToMany(User::class, 'enrollable', 'enrollments');
    }
}
