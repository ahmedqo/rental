<?php

namespace App\Models;

use App\Traits\HasSearch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory, HasSearch;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'car',
        'name',
        'email',
        'rate',
        'content',
        'status',
    ];

    protected $searchable = [
        'car.name',
        'name',
        'email',
        'rate',
        'content',
        'status',
    ];

    public function Car()
    {
        return $this->belongsTo(Car::class, 'car');
    }
}
