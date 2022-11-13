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

    public function getRoleBatch($id = null){

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

        return !empty($id) ? $role[$id] : '' ;
    }

    public function getJawatan($id = null){

        $role = [
            'ketuaUnitMpv'      =>  'KETUA UNIT MPV',
            'sarjanMejarMpv'    =>  'SARJAN MEJAR MPV',
            'PentadbiranBpjkk'  =>  'SARJAN PENTADBIRAN BPJKK',
            'pengaturTugas'     =>  'PENGATUR TUGAS',
            'penyeliaKenderaan' =>  'PENYELIA KENDERAAN/POL 200',
            'pejabatBpjkk'      =>  'PEJABAT BPJKK',
            'tugasDespatch'     =>  'TUGAS DESPATCH',
        ];

        return !empty($id) ? $role[$id] : '' ;
    }

    public function countRole($id = null){
        $count = Officer::where('role_batch',$id)->count();
        return !empty($id) ? $count : '' ;
    }

    public function getOfficer($id = null){
        $officer = Officer::find($id);
        return !empty($id) ? $officer : '' ;
    }

    public function getOfficerBatchNum($id = null){
        $officer = Officer::find($id);
        return !empty($id) ? $officer->batch_num : '' ;
    }

    public function getOfficername($id = null){
        $officer = Officer::find($id);
        return !empty($id) ? $officer->name : '' ;
    }

}
