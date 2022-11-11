<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role_batch',
        'batch_num',
        'updated_by'
    ];

    function getRoleBatch($id = null){

        $role = [
            1  =>  'ASP',
            2  =>  'SM',
            3  =>  'SJN',
            4  =>  'KPL',
            5  =>  'L/KPL',
            6  =>  'KONS',
            7  =>  'KPL/S',
            8  =>  'LK/S',
            9  =>  'K/S',
            10  =>  'KA',
        ];

        return !empty($id) ? $role[$id] : $role ;
    }
}
