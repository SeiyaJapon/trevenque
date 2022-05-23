<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory, Uuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'title_id',
        'credits',
        'course',
        'max_students',
        'created_at',
        'updated_at'
    ];



    /************************
     *    Relationships     *
     ************************/

    public function title()
    {
        return $this->belongsTo(Title::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'students_courses');
    }

    public function qualifications()
    {
        $start = Carbon::now()->startOfYear();
        $end = Carbon::now()->endOfYear();

        return $this->hasMany(Qualification::class)
            ->whereBetween('year', [$start, $end])
            ->where('tries', '<', 2)
            ->orderByDesc('year')
            ->limit(1);
    }

    public function lastQualifications()
    {
        $start = Carbon::now()->startOfYear();
        $end = Carbon::now()->endOfYear();

        return $this->hasMany(Qualification::class)
            ->whereBetween('year', [$start, $end])
            ->orderByDesc('year');
    }
}
