<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\Roster;
use DataTables;

class RosterController extends Controller
{
    public function index()
    {
        return view('roster.index');
    }

    public function getAjax()
    {
        $results = Roster::all();
        $return = [];
        foreach ($results as $key => $res) {
            // !empty($res->tarikh_mula) ? dd(date_format($res->tarikh_mula,"Y-m-d H:i:s")) : '';
            // dd($res->id);

            $return [] = [
                'id'      => Crypt::encrypt($res->id),
                'pindaan' => $res->pindaan,
                // 'tarikh'  => !empty($res->tarikh_mula) ? date_format(strtotime($res->tarikh_mula),"d/m/Y") : "-",
                'tarikh'  => !empty($res->tarikh_mula) ? $res->tarikh_mula : "-",
                'status'  => "draf",
            ];
        }
        return DataTables::of($return)
                            ->addIndexColumn()
                            ->make(true);
    }

    public function create()
    {
        $roster = new Roster;

        return view('roster.create_roster');
    }

    public function create2()
    {
        return view('roster.create2');
    }

    public function store(Request $request)
    {

        // dd($request->toArray());
        $roster = new Roster;

        $roster->pindaan        =   !empty($request->pindaan) ? $request->pindaan : '-';
        $roster->tarikh_mula    =   $request->tarikhMula;
        $roster->tarikh_habis   =   $request->tarikhHabis;

        $position = [
            'ketuaUnitMpv'      => $request->ketuaUnitMpv,
            'sarjanMejarMpv'    => $request->sarjanMejarMpv,
            'PentadbiranBpjkk'  => $request->PentadbiranBpjkk,
            'pengaturTugas'     => $request->pengaturTugas,
            'penyeliaKenderaan' => $request->penyeliaKenderaan,
            'pejabatBpjkk'      => $request->pejabatBpjkk,
            'tugasDespatch'     => $request->tugasDespatch,
        ];
        $roster->position = json_encode($position);

        $cuti = $request->toArray();
        $leave = [];
        for ($i=1; $i < $request->countCuti+1 ; $i++) {
            $leave [$i] = [
                'anggota'   => $cuti['anggotaCuti'.$i],
                'start'     => $cuti['startDateCuti'.$i],
                'end'       => $cuti['endDateCuti'.$i],
            ];
        }
        $roster->leave          = json_encode($leave);

        $leave_sick = [];
        for ($i=1; $i < $request->countCutiSakit+1 ; $i++) {
            $leave_sick [$i] = [
                'anggota'   => $cuti['anggotaCutiSakit'.$i],
                'start'     => $cuti['startDateSakit'.$i],
                'end'       => $cuti['endDateSakit'.$i],
            ];
        }
        $roster->leave_sick     = json_encode($leave_sick);


        $sv = $request->toArray();
        $co     = [$request->syif_0816_co,$request->syif_1600_co,$request->syif_0008_co];
        $pilot  = [$request->syif_0816_pilot,$request->syif_1600_pilot,$request->syif_0008_pilot];
        $kereta = [$request->syif_0816_kereta,$request->syif_1600_kereta,$request->syif_0008_kereta];

        $sv_mpv = [
            'co' =>     $co,
            'pilot'=>   $pilot,
            'kereta'=>  $kereta,
        ];
        $roster->sv_mpv = json_encode($sv_mpv);

        $roster->control_room       = json_encode($request->operasi_pentadbiran);
        $roster->departure_sv_mpv   = json_encode($request->penyelia_mpv);

        $tugasArr = $request->toArray();
        $tugas = [];
        for ($i=1; $i < $request->countTugas+1 ; $i++) {
            $tugas [$i] = [
                'penugasan'   => $tugasArr['penugasan'.$i],
                'pegawai'     => !empty($tugasArr['pegawaiPenugasan'.$i]) ? $tugasArr['pegawaiPenugasan'.$i] : '-',
            ];
        }
        $roster->other_task          = json_encode($tugas);
        // dd($request->pegawaiKelepasan);
        $roster->departure = json_encode($request->pegawaiKelepasan);

        $shift = $request->toArray();

        $categorys   = ['AB', 'CD', 'EF'];
        $times       = ['0816', '1600', '0008'];
        $types       = ['Co', 'Pi', 'Car'];

        $ABCo = [];
        $ABPi = [];
        $ABKereta = [];
        foreach ($shift as $key => $value) {
            if (strpos($key, 'ronda_') !== false) {
                if (strpos($key, 'ronda_AB') !== false) {
                    foreach ($times as $i => $time) {
                        if (strpos($key, 'ronda_AB'.$time.'_Co1') !== false) {
                            $ABCo [$key] = $value;
                        }
                        if (strpos($key, 'ronda_AB'.$time.'_Co2') !== false) {
                            $ABCo [$key] = $value;
                        }
                        if (strpos($key, 'ronda_AB'.$time.'_Pi1') !== false) {
                            $ABPi [$key] = $value;
                        }
                        if (strpos($key, 'ronda_AB'.$time.'_Pi2') !== false) {
                            $ABPi [$key] = $value;
                        }
                        if (strpos($key, 'ronda_AB'.$time.'_Kereta1') !== false) {
                            $ABKereta [$key] = $value;
                        }
                        if (strpos($key, 'ronda_AB'.$time.'_Kereta2') !== false) {
                            $ABKereta [$key] = $value;
                        }
                    }
                }
            }
        }
        $AB = [
            'co'    => $ABCo,
            'pilot' => $ABPi,
            'kereta' =>$ABKereta
        ];

        $roster->zone_AB = json_encode($AB);


        $CDCo = [];
        $CDPi = [];
        $CDKereta = [];
        foreach ($shift as $key => $value) {
            if (strpos($key, 'ronda_') !== false) {
                if (strpos($key, 'ronda_CD') !== false) {
                    foreach ($times as $i => $time) {
                        if (strpos($key, 'ronda_CD'.$time.'_Co1') !== false) {
                            $CDCo [$key] = $value;
                        }
                        if (strpos($key, 'ronda_CD'.$time.'_Co2') !== false) {
                            $CDCo [$key] = $value;
                        }
                        if (strpos($key, 'ronda_CD'.$time.'_Pi1') !== false) {
                            $CDPi [$key] = $value;
                        }
                        if (strpos($key, 'ronda_CD'.$time.'_Pi2') !== false) {
                            $CDPi [$key] = $value;
                        }
                        if (strpos($key, 'ronda_CD'.$time.'_Kereta1') !== false) {
                            $CDKereta [$key] = $value;
                        }
                        if (strpos($key, 'ronda_CD'.$time.'_Kereta2') !== false) {
                            $CDKereta [$key] = $value;
                        }
                    }
                }
            }
        }
        $CD = [
            'co'    => $CDCo,
            'pilot' => $CDPi,
            'kereta' =>$CDKereta
        ];

        $roster->zone_CD = json_encode($CD);


        $EFCo = [];
        $EFPi = [];
        $EFKereta = [];
        foreach ($shift as $key => $value) {
            if (strpos($key, 'ronda_') !== false) {
                if (strpos($key, 'ronda_EF') !== false) {
                    foreach ($times as $i => $time) {
                        if (strpos($key, 'ronda_EF'.$time.'_Co1') !== false) {
                            $EFCo [$key] = $value;
                        }
                        if (strpos($key, 'ronda_EF'.$time.'_Co2') !== false) {
                            $EFCo [$key] = $value;
                        }
                        if (strpos($key, 'ronda_EF'.$time.'_Pi1') !== false) {
                            $EFPi [$key] = $value;
                        }
                        if (strpos($key, 'ronda_EF'.$time.'_Pi2') !== false) {
                            $EFPi [$key] = $value;
                        }
                        if (strpos($key, 'ronda_EF'.$time.'_Kereta1') !== false) {
                            $EFKereta [$key] = $value;
                        }
                        if (strpos($key, 'ronda_EF'.$time.'_Kereta2') !== false) {
                            $EFKereta [$key] = $value;
                        }
                    }
                }
            }
        }
        $EF = [
            'co'    => $EFCo,
            'pilot' => $EFPi,
            'kereta' =>$EFKereta
        ];

        $roster->zone_EF = json_encode($EF);


        $roster->save();

        return redirect()
            ->route('rosters.home')
            ->with('message', 'New item has been successfully added.');

        // AB CD EF
        // 0816 1600 0008
        // Co Pi Car
        // ronda_AB0816_Co

        // dd($tugas);
        // return view('roster.create');
    }

    public function edit($id)
    {
        return view('roster.edit');
    }

    public function update(Request $request, $id)
    {
        return view('roster.edit');
    }

    public function destroy($id)
    {
        Roster::find($id)->forceDelete();

        return redirect()->back()->with('message', 'The report successfully has been deleted.');
    }

    public function preview(Request $request){
        // dd($id);
        try {
            $id = Crypt::decrypt($request->id);
        } catch (\Throwable $th) {
            // return $th;
        }
        // dd( $id);
        // $id = 1;

        return view("roster.preview", compact('id'));
        // return view('modules.instruments.preview', compact('id'));

    }

    public function iframe($id){

        $roster = Roster::find($id);
        // dd($roster);
        return view("roster.iframe_roster", compact('roster'));

    }
}
