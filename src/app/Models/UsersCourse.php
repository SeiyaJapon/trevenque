<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersCourse extends Model
{
    use HasFactory, Uuids;

    protected $table = 'students_courses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'user_id',
        'course_id',
        'created_at',
        'updated_at'
    ];



    /************************
     *    Relationships     *
     ************************/

    public function students()
    {
        return $this->belongsToMany(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
