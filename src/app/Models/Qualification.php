<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory, Uuids;

    protected $table = 'qualification';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'user_id',
        'course_id',
        'tries',
        'year',
        'note',
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
