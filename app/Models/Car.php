<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'no_plate',
        'updated_by'
    ];


    public function getCar($id = null){

        $car = Car::find($id);

        return !empty($id) ? $car : '';
    }
}
