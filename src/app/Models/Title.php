<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
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
        'created_at',
        'updated_at'
    ];



    /************************
     *    Relationships     *
     ************************/

    public function courses()
    {
        return $this->hasMany(Course::class);
    }



    /************************
     *      Methods       *
     ************************/

    // public function save(Request $request): self
    // {
    //     $this->save($request);
    //
    //     return $this;
    // }
}
