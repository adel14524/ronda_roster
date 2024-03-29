<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
    use HasFactory;

    protected $fillable = [
        'pindaan',
        'pindaan',
        'tarikh_mula',
        'tarikh_habis',
        'title',
        'leave',
        'leave_sick',
        'control_room',
        'sv_mpv',
        'departure_sv_mpv',
        'other_task',
        'departure',
        'zone_AB',
        'zone_CD',
        'zone_EF',
        'depot_unit',
        'remarks',
        'status',
    ];

    public function getHari($hari = nuLl){

        $days = [
            'Sun' => 'AHAD',
            'Mon' => 'ISNIN',
            'Tue' => 'SELASA',
            'Wed' => 'RABU',
            'Thu' => 'KHAMIS',
            'Fri' => 'JUMAAT',
            'Sat' => 'SABTU'
        ];

        if ($hari != null) {
            return $days[$hari];
        }else{
            return $days;
        }

    }
}
