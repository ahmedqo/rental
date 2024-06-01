<?php

namespace App\Models;

use App\Traits\HasSearch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
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
        'phone',
        'location',
        'from',
        'to',
        'period',
        'total',
        'charges',
        'status',
    ];

    protected $searchable = [
        'car.name',
        'name',
        'email',
        'phone',
        'location',
        'from',
        'to',
        'period',
        'total',
        'charges',
        'status',
    ];

    public function Car()
    {
        return $this->belongsTo(Car::class, 'car');
    }
}
