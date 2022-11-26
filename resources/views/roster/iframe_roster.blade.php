<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> --}}
    <link rel="stylesheet" href="{{ asset('css/roster.css') }}" type="text/css" />
    {{-- <script src="//unpkg.com/pagedjs/dist/paged.polyfill.js"></script> --}}
    <script src="{{ asset('js/paged.polyfill.js') }}"></script>
    <script type="text/javascript" src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>

    <title>POLIS</title>

    @php
        $pageWidth = 210;
        $pagePadding = 5;

        $mainTable1Width = (210 - (5 * 2)) / 2;
        $mainTable1Width = $mainTable1Width - 10;
        $mainTable2Width = 18;
        $mainTable3Width = $mainTable1Width - $mainTable2Width;

        $secondTableWidth = 210 - (5 * 2);
        $colpertama       = 0.4 * $secondTableWidth;
        $colkedua         = 0.4 * $secondTableWidth;

        $thirdTableWidth = 210 - (5 * 2);
        $masaZone = 0.1 * $thirdTableWidth;
        $jam = (0.3 * $thirdTableWidth)-10;


        $pad_left = 3;

    @endphp

    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            padding: 0px;
            margin: 0px;
            font-size: 8pt;
        }

        header{
            font-size: 8pt;
        }

        body {
            /* padding: {{ $pagePadding }}mm; */
        }

        table {
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        td .list_sop{
            font-size: 5pt;
        }

        .no_border{
            border: none;
        }
        .no_right_border{
            border-right: none;
        }
        .no_left_border{
            border-left: none;
        }
        .no_xy_border{
            border-left: none;
            border-right: none;
        }
        .border{
            border: 1px solid black;
        }

        .pad-left{
            padding-left: {{ $pad_left }}mm;
        }

        .pad-x{
            padding-left: 0mm;
            padding-right: 0mm;
        }

        .textCtr{
            text-align: center;
        }
        .anggota_pgkt_jwtn{
            line-height: 6mm;
        }
        .lain_penugasan{
            line-height: 4mm;
        }
        .border-bottom{
            border-bottom: none;
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .list_sop{
            padding-left: 2mm;
            padding-right: 2mm
        }
    </style>

</head>

<body class="tinymce-inline-body">

    <div class="table_pertama page-break-always" >
        {{-- <header> --}}
            <table style="border: none;">
                <tbody>
                    <tr style="border: none; vertival-align:top">
                        <td style="width: {{ $mainTable1Width - 20 }}mm; border: none; text-align: left ; font-size: 8pt">
                            {{ $roster->pindaan }}
                        </td>
                        <td style="width: {{ $mainTable2Width+0.7 }}mm; border: none;">
                            {{-- <img width=100% height=54 src="{{ asset('images/pdrm-transparent.png') }}"> --}}
                        </td>
                        <td style="width: {{ $mainTable3Width }}mm; border: none; text-align: right; font-size: 8pt">
                            @php
                                $tarikh_mula = strtotime($roster->tarikh_mula);
                                $mula = date('D', $tarikh_mula);

                                $tarikh_habis = strtotime($roster->tarikh_habis);
                                $habis = date('D', $tarikh_habis);
                            @endphp
                            TARIKH: <br> {{$roster->tarikh_mula  }} ({{ \App\Models\Roster::getHari($mula) }}) <br> {{ $roster->tarikh_habis }} ({{ \App\Models\Roster::getHari($habis) }})
                        </td>
                    </tr>
                    <tr>
                        <td  style="border: none;"></td>
                        <td style="border: none;">
                            <img width=100%  src="{{ asset('images/pdrm-transparent.png') }}">
                        </td>
                        <td  style="border: none;"></td>
                    </tr>
                    <tr style="border: none; text-align: center ;">
                        <td style=" border: none; font-size: 8pt" colspan="3">DAFTAR PEKERJAAN HARI-HARI UNIT KERETA PERONDA IPD KOTA SETAR</td>
                    </tr>
                </tbody>
            </table>
        {{-- </header> --}}

        {{-- <main> --}}
            <table style="border: none;">
                <tbody >
                    {{-- first row outer table row --}}
                    <tr>
                        <td style="width: {{ $mainTable1Width }}mm;">
                            <table style="height: 30mm; border: none;">
                                <tbody>
                                    <tr style="vertical-align: center" class="anggota_pgkt_jwtn">
                                        <td colspan="13" style="text-align: center; border:none;">KEANGGOTAAN MENGIKUT WARAN K63/2014,K78 & K130</td>
                                    </tr>
                                    <tr  class="anggota_pgkt_jwtn ">
                                        <td class="textCtr no_left_border">PANGKAT</td>
                                        @for ($i = 0; $i < 11; $i++)
                                            <td class="textCtr" data-value="{{ $i }}">{{ \App\Models\Officer::getRoleBatch($i) }}</td>
                                        @endfor
                                        <td class="textCtr no_left_border">JUM</td>
                                    </tr>
                                    <tr   class="anggota_pgkt_jwtn ">
                                        <td class="textCtr no_left_border">JAWATAN</td>
                                        @for ($i = 0; $i < 11; $i++)
                                            <td class="textCtr ">{{ \App\Models\Officer::countRole($i) }}</td>
                                        @endfor
                                        <td class="textCtr no_left_border">{{ \App\Models\Officer::count() }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <table style="border: none;" class="border-bottom">
                                <tbody style="font-size: 7pt;">
                                    @php $i = 1; @endphp
                                    @foreach ($position as $key => $pos)
                                        <tr  style="line-height: 5mm" >
                                            <td class=" pad-left no_left_border" style="width: {{ $mainTable1Width/2 - $pad_left }}mm;" >{{ $i }}. {{ \App\Models\Officer::getJawatan($key) }}</td>
                                            @if ($key == 'pejabatBpjkk')
                                                <td class=" pad-left no_left_border" style="width: {{ $mainTable1Width/2 - $pad_left }}mm;" >
                                                    @if (!empty($pos))
                                                        @foreach ($pos as $id)
                                                            {{ \App\Models\Officer::getOfficerBatchNum($id)  }},&nbsp;
                                                        @endforeach
                                                    @endif
                                                </td>
                                            @else
                                                @switch($i)
                                                    @case(1)
                                                        <td class=" pad-left no_left_border" style="width: {{ $mainTable1Width/2 - $pad_left }}mm;" > {{ \App\Models\Officer::getOfficerBatchNum($pos)  }} {{ \App\Models\Officer::getOfficername($pos)  }}</td>
                                                        @break
                                                    @default
                                                    <td class=" pad-left no_left_border" style="width: {{ $mainTable1Width/2 - $pad_left }}mm;" > {{ \App\Models\Officer::getOfficerBatchNum($pos)  }}</td>

                                                @endswitch
                                            @endif
                                        </tr>
                                        @php
                                            $i++
                                        @endphp

                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                        <td style="width: {{ $mainTable2Width }}mm;">
                            <table class="no_border">
                                <tbody style="font-size: 6pt;" class="no_border">
                                    <tr class="no_border textCtr">
                                        <td class="no_border">
                                            <br>
                                            CUTI:
                                            <br><br>

                                            @foreach ($leave as $cuti)
                                                {{ \App\Models\Officer::getOfficerBatchNum($cuti['anggota'])  }}
                                                <br>
                                                {{-- {{ dd($cuti['start']) }} --}}
                                                @php
                                                $dt = explode("-",$cuti['start']);
                                                $dta = explode("-",$cuti['end']);

                                                $year = str_split($dta[0]);
                                                @endphp
                                                @if (!empty($cuti['start'] && !empty($cuti['end'])))

                                                {{ $dt[2] }} - {{ $dta[2]}}/{{ $dta[1] }}/{{ $year[2].$year[3] }}
                                                @endif
                                            @endforeach

                                            <br>
                                        </td>
                                    </tr>
                                    <tr class="no_border textCtr">
                                        <td class="no_border">
                                            <br>
                                            CUTI SAKIT:
                                            <br>
                                            <br>
                                            @foreach ($sick as $cuti)
                                                {{ \App\Models\Officer::getOfficerBatchNum($cuti['anggota'])  }}
                                                <br>
                                                {{-- {{ dd($cuti['start']) }} --}}
                                                @php
                                                $dt = explode("-",$cuti['start']);
                                                $dta = explode("-",$cuti['end']);

                                                $year = str_split($dta[0]);
                                                @endphp
                                                @if (!empty($cuti['start'] && !empty($cuti['end'])))

                                                {{ $dt[2] }} - {{ $dta[2]}}/{{ $dta[1] }}/{{ $year[2].$year[3] }}
                                                @endif
                                            @endforeach
                                            <br>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td style="width: {{ $mainTable3Width }}mm;">

                            <table style="height: 29mm;" class="no_border">
                                <tbody class="no_border">
                                    <tr class="anggota_pgkt_jwtn textCtr">
                                        <td class="no_border">
                                            BILIK OPERASI/PENTADBIRAN OPERASI
                                        </td>
                                    </tr>
                                    <tr class="anggota_pgkt_jwtn textCtr">
                                        <td class="no_xy_border">
                                            @if (!empty($control))
                                                @foreach ($control as $ctrl)
                                                    {{ \App\Models\Officer::getOfficerBatchNum($ctrl) }}
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>

                                </tbody>
                            </table>

                            <table class="no_border">
                                <tbody>
                                    <tr class="anggota_pgkt_jwtn textCtr">
                                        <td colspan="3" class="no_xy_border">
                                            PENYELIA MPV (SETAR 22 A)
                                        </td>
                                    </tr>
                                    <tr class="anggota_pgkt_jwtn textCtr">
                                        @foreach ($sv_mpv['co'] as $key => $co)
                                            <td class="{{ $key == 0 ? 'no_left_border' : $key == 2 ? 'no_right_border' : '' }}">
                                                {{-- {{ $co }} --}}
                                                {{ \App\Models\Officer::getOfficerBatchNum($co)  }} (C)
                                            </td>
                                        @endforeach
                                    </tr>
                                    <tr class="anggota_pgkt_jwtn textCtr">
                                        @foreach ($sv_mpv['pilot'] as $key => $pilot)
                                            <td class="{{ $key == 0 ? 'no_left_border' : $key == 2 ? 'no_right_border' : '' }}">
                                                {{-- {{ $co }} --}}
                                                {{ \App\Models\Officer::getOfficerBatchNum($pilot)  }} (P)
                                            </td>
                                        @endforeach
                                    </tr>
                                    <tr class="anggota_pgkt_jwtn textCtr">
                                        @foreach ($sv_mpv['kereta'] as $key => $kereta)
                                            <td class="{{ $key == 0 ? 'no_left_border' : $key == 2 ? 'no_right_border' : '' }}">
                                                {{-- {{ $co }} --}}
                                                {{-- {{ $kereta }} --}}
                                                ({{ !empty(\App\Models\Car::getCar($kereta)) ? \App\Models\Car::getCar($kereta)->code : '-'  }}) {{ !empty(\App\Models\Car::getCar($kereta)) ? \App\Models\Car::getCar($kereta)->no_plate : '-'  }}
                                            </td>
                                        @endforeach
                                    </tr>

                                </tbody>
                            </table>

                            <table class="no_border">
                                <tbody>
                                    <tr class="anggota_pgkt_jwtn textCtr">
                                        <td class="no_border">
                                            <u>KELEPASAN PENYELIA MPV</u>
                                            <br>
                                            @if (!empty($dep_sv))
                                                @foreach ($dep_sv as $dep)
                                                    {{ \App\Models\Officer::getOfficerBatchNum($dep)  }} &nbsp;
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </td>
                    </tr>
                    {{-- first row outer table row --}}

                    {{-- second row outer table row --}}
                    <tr>
                        <td colspan="3" style="border: none">
                            <table>
                                <tbody>
                                    <tr class="anggota_pgkt_jwtn">
                                        <td colspan="2" style="vertical-align:center ;width:{{ $mainTable1Width + $mainTable2Width + $mainTable3Width }}mm; text-align: center; border: none;">LAIN – LAIN PENUGASAN</td>
                                    </tr>
                                    <tr class="lain_penugasan">
                                        <td class="pad-left" style="width: {{ $colpertama - $pad_left}}mm">LAWATAN LOKASI SASARAN PENTING</td>
                                        <td class="pad-left" style="width: {{ $mainTable3Width - $pad_left}}mm">TINDAKAN PENYELIA SYIF</td>
                                    </tr>
                                    @php $i = 1; @endphp
                                    @foreach ($tasks as $task)
                                        <tr class="lain_penugasan">
                                            <td class="pad-left" style="width: {{ $colpertama }}mm ; "> {{ $i }}. {{ $task['penugasan'] }}</td>
                                            <td class="pad-left" style="width: {{ $mainTable3Width }}mm">
                                                @if ($task['pegawai'] != '-')
                                                    @foreach ($task['pegawai'] as $peg)
                                                        {{ \App\Models\Officer::getOfficerBatchNum($peg)  }}, &nbsp;
                                                    @endforeach
                                                @endif
                                            </td>
                                        </tr>
                                        @php $i++ @endphp
                                    @endforeach

                                    <tr class="anggota_pgkt_jwtn">
                                        <td colspan="2" style="vertical-align:center ;width:{{ $mainTable1Width + $mainTable2Width + $mainTable3Width }}mm; text-align: center; border: none;">KELEPASAN / STANDBY</td>
                                    </tr>
                                    <tr class="lain_penugasan">
                                        <td colspan="2" style="vertical-align:center ;width:{{ $mainTable1Width + $mainTable2Width + $mainTable3Width }}mm; text-align: center; ">
                                            @if (!empty($departure))

                                                @foreach ($departure as $dep)
                                                        {{ \App\Models\Officer::getOfficerBatchNum($dep)  }}, &nbsp;
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </td>
                    </tr>
                    {{-- second row outer table row --}}

                    {{-- third row outer table row --}}
                    <tr>
                        <td colspan="3" style="border: none">
                            <table>
                                <tbody>
                                    <tr style="border: none; text-align: center" class="anggota_pgkt_jwtn">
                                        <td style="width: {{ $masaZone }}mm;">MASA</td>
                                        <td style="width: {{ $jam }}mm;">0800HRS – 1600HRS</td>
                                        <td style="width: {{ $jam }}mm;">1600HRS – 0000HRS</td>
                                        <td style="width: {{ $jam }}mm;">0001HRS – 0800HRS</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    {{-- third row outer table row --}}

                    {{-- four row outer table row --}}
                    <tr>
                        <td colspan="3" style="border: none">
                            <table style="border: none;">
                                <tbody >
                                    @php
                                    $categorys   = [1 => 'AB', 2 => 'CD', 3 => 'EF'];
                                    $times       = ['0816', '1600', '0008'];
                                    $types       = ['Co', 'Pi', 'Car'];
                                    @endphp

                                    @foreach ($categorys as  $key => $cat)
                                        {{-- row copilot --}}
                                        <tr style="border: none; text-align: center" class="lain_penugasan">
                                            @if ($key == 1)
                                                <td rowspan="3" style="width: {{ $masaZone - 0.25 }}mm;">MPV ZON <br> “A & B”</td>
                                                @foreach ($times as $time)
                                                    <td style="border: none;">
                                                        <table style="border: none;">
                                                            <tbody style="border: none;">
                                                                <tr style="border: none; text-align: center" >
                                                                    <td  style="width: {{ ($jam/2)-0.5 }}mm;">{{ !empty($zone_AB['co']['ronda_'.$cat.$time.'_Co1']) ? \App\Models\Officer::getOfficerBatchNum($zone_AB['co']['ronda_'.$cat.$time.'_Co1']) : '-' }}</td>
                                                                    <td  style="width: {{ ($jam/2)-0.5 }}mm;">{{ !empty($zone_AB['co']['ronda_'.$cat.$time.'_Co2']) ? \App\Models\Officer::getOfficerBatchNum($zone_AB['co']['ronda_'.$cat.$time.'_Co2']) : '-' }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                @endforeach
                                            @elseif ($key == 2)
                                                <td rowspan="3" style="width: {{ $masaZone - 0.25 }}mm;">MPV ZON <br> “C & D”</td>
                                                @foreach ($times as $time)
                                                    <td style="border: none;">
                                                        <table style="border: none;">
                                                            <tbody style="border: none;">
                                                                <tr style="border: none; text-align: center" >
                                                                    <td  style="width: {{ ($jam/2)-0.5 }}mm;">{{ !empty($zone_CD['co']['ronda_'.$cat.$time.'_Co1']) ? \App\Models\Officer::getOfficerBatchNum($zone_CD['co']['ronda_'.$cat.$time.'_Co1']) : '-' }}</td>
                                                                    <td  style="width: {{ ($jam/2)-0.5 }}mm;">{{ !empty($zone_CD['co']['ronda_'.$cat.$time.'_Co2']) ? \App\Models\Officer::getOfficerBatchNum($zone_CD['co']['ronda_'.$cat.$time.'_Co2']) : '-' }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                @endforeach
                                            @elseif ($key == 3)
                                                <td rowspan="3" style="width: {{ $masaZone - 0.25 }}mm;">MPV ZON <br> “E & F”</td>
                                                @foreach ($times as $time)
                                                    <td style="border: none;">
                                                        <table style="border: none;">
                                                            <tbody style="border: none;">
                                                                <tr style="border: none; text-align: center" >
                                                                    <td  style="width: {{ ($jam/2)-0.5 }}mm;">{{ !empty($zone_EF['co']['ronda_'.$cat.$time.'_Co1']) ? \App\Models\Officer::getOfficerBatchNum($zone_EF['co']['ronda_'.$cat.$time.'_Co1']) : '-' }}</td>
                                                                    <td  style="width: {{ ($jam/2)-0.5 }}mm;">{{ !empty($zone_EF['co']['ronda_'.$cat.$time.'_Co2']) ? \App\Models\Officer::getOfficerBatchNum($zone_EF['co']['ronda_'.$cat.$time.'_Co2']) : '-' }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                @endforeach
                                            @endif
                                        </tr>
                                        {{-- row pilot --}}
                                        <tr style="border: none; text-align: center" class="lain_penugasan">
                                            @if ($key == 1)
                                                @foreach ($times as $time)
                                                    <td class="no_border" style="width: {{ $jam }}mm;">
                                                        <table style="border: none">
                                                            <tr style="border: none; text-align: center" >
                                                                <td  style="width: {{ ($jam/2)-0.5 }}mm;">{{ !empty($zone_AB['pilot']['ronda_'.$cat.$time.'_Pi1']) ? \App\Models\Officer::getOfficerBatchNum($zone_AB['pilot']['ronda_'.$cat.$time.'_Pi1']) : '-' }}</td>
                                                                <td  style="width: {{ ($jam/2)-0.5 }}mm;">{{ !empty($zone_AB['pilot']['ronda_'.$cat.$time.'_Pi2']) ? \App\Models\Officer::getOfficerBatchNum($zone_AB['pilot']['ronda_'.$cat.$time.'_Pi2']) : '-' }}</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                @endforeach

                                            @elseif ($key == 2)
                                                @foreach ($times as $time)
                                                    <td class="no_border" style="width: {{ $jam }}mm;">
                                                        <table style="border: none">
                                                            <tr style="border: none; text-align: center" >
                                                                <td  style="width: {{ ($jam/2)-0.5 }}mm;">{{ !empty($zone_CD['pilot']['ronda_'.$cat.$time.'_Pi1']) ? \App\Models\Officer::getOfficerBatchNum($zone_CD['pilot']['ronda_'.$cat.$time.'_Pi1']) : '-' }}</td>
                                                                <td  style="width: {{ ($jam/2)-0.5 }}mm;">{{ !empty($zone_CD['pilot']['ronda_'.$cat.$time.'_Pi2']) ? \App\Models\Officer::getOfficerBatchNum($zone_CD['pilot']['ronda_'.$cat.$time.'_Pi2']) : '-' }}</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                @endforeach
                                            @elseif ($key == 3)
                                                @foreach ($times as $time)
                                                    <td class="no_border" style="width: {{ $jam }}mm;">
                                                        <table style="border: none">
                                                            <tr style="border: none; text-align: center" >
                                                                <td  style="width: {{ ($jam/2)-0.5 }}mm;">{{ !empty($zone_EF['pilot']['ronda_'.$cat.$time.'_Pi1']) ? \App\Models\Officer::getOfficerBatchNum($zone_EF['pilot']['ronda_'.$cat.$time.'_Pi1']) : '-' }}</td>
                                                                <td  style="width: {{ ($jam/2)-0.5 }}mm;">{{ !empty($zone_EF['pilot']['ronda_'.$cat.$time.'_Pi2']) ? \App\Models\Officer::getOfficerBatchNum($zone_EF['pilot']['ronda_'.$cat.$time.'_Pi2']) : '-' }}</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                @endforeach
                                            @endif

                                        </tr>
                                        {{-- row kereta --}}
                                        <tr style="border: none; text-align: center" class="lain_penugasan">
                                            @if ($key == 1)
                                                @foreach ($times as $time)
                                                    <td class="no_border" style="width: {{ $jam }}mm;">
                                                        <table style="border: none">
                                                            <tr style="border: none; text-align: center" >
                                                                <td  style="width: {{ ($jam/2)-0.5 }}mm;">{{ !empty($zone_AB['kereta']['ronda_'.$cat.$time.'_Kereta1']) ? '('.\App\Models\Car::getCar($zone_AB['kereta']['ronda_'.$cat.$time.'_Kereta1'])->code.') '.\App\Models\Car::getCar($zone_AB['kereta']['ronda_'.$cat.$time.'_Kereta1'])->no_plate  : '-' }}</td>
                                                                <td  style="width: {{ ($jam/2)-0.5 }}mm;">{{ !empty($zone_AB['kereta']['ronda_'.$cat.$time.'_Kereta2']) ? '('.\App\Models\Car::getCar($zone_AB['kereta']['ronda_'.$cat.$time.'_Kereta2'])->code.') '.\App\Models\Car::getCar($zone_AB['kereta']['ronda_'.$cat.$time.'_Kereta2'])->no_plate  : '-' }}</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                @endforeach
                                            @elseif ($key == 2)
                                                @foreach ($times as $time)
                                                    <td class="no_border" style="width: {{ $jam }}mm;">
                                                        <table style="border: none">
                                                            <tr style="border: none; text-align: center" >
                                                                <td  style="width: {{ ($jam/2)-0.5 }}mm;">{{ !empty($zone_CD['kereta']['ronda_'.$cat.$time.'_Kereta1']) ? '('.\App\Models\Car::getCar($zone_CD['kereta']['ronda_'.$cat.$time.'_Kereta1'])->code.') '.\App\Models\Car::getCar($zone_CD['kereta']['ronda_'.$cat.$time.'_Kereta1'])->no_plate  : '-' }}</td>
                                                                <td  style="width: {{ ($jam/2)-0.5 }}mm;">{{ !empty($zone_CD['kereta']['ronda_'.$cat.$time.'_Kereta2']) ? '('.\App\Models\Car::getCar($zone_CD['kereta']['ronda_'.$cat.$time.'_Kereta2'])->code.') '.\App\Models\Car::getCar($zone_CD['kereta']['ronda_'.$cat.$time.'_Kereta2'])->no_plate  : '-' }}</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                @endforeach
                                            @elseif ($key == 3)
                                                 @foreach ($times as $time)
                                                    <td class="no_border" style="width: {{ $jam }}mm;">
                                                        <table style="border: none">
                                                            <tr style="border: none; text-align: center" >
                                                                <td  style="width: {{ ($jam/2)-0.5 }}mm;">{{ !empty($zone_EF['kereta']['ronda_'.$cat.$time.'_Kereta1']) ? '('.\App\Models\Car::getCar($zone_EF['kereta']['ronda_'.$cat.$time.'_Kereta1'])->code.') '.\App\Models\Car::getCar($zone_EF['kereta']['ronda_'.$cat.$time.'_Kereta1'])->no_plate  : '-' }}</td>
                                                                <td  style="width: {{ ($jam/2)-0.5 }}mm;">{{ !empty($zone_EF['kereta']['ronda_'.$cat.$time.'_Kereta2']) ? '('.\App\Models\Car::getCar($zone_EF['kereta']['ronda_'.$cat.$time.'_Kereta2'])->code.') '.\App\Models\Car::getCar($zone_EF['kereta']['ronda_'.$cat.$time.'_Kereta2'])->no_plate  : '-' }}</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                @endforeach
                                            @endif

                                        </tr>

                                        @if ($key != 3)
                                            <tr class="lain_penugasan">
                                                <td colspan="4">
                                                    &nbsp;
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    {{-- four row outer table row --}}

                    <tr>
                        <td colspan="3" style="border: none">
                            <table >
                                <tbody style=" ">
                                    <tr style="line-height: 4mm">
                                        <td colspan="3" style=" text-align: center; border: none;">
                                            *POHON PENYELIA SHIFT MAKLUM KEPADA KETUA UNIT MPV SEKIRANYA ADA ANGGOTA YANG LAPOR SAKIT @ TIDAK HADIR TUGAS*
                                        </td>
                                    </tr>
                                    <tr style="line-height: 4mm">
                                        <td colspan="3" style=" text-align: center; border: none;">
                                            *SNAPCHECK TIDAK DI BENARKAN KECUALI ATAS ARAHAN PEGAWAI KANAN, ATAU SNAPCHECK ITU DI HADIRI OLEH PEGAWAI KANAN *
                                        </td>
                                    </tr>
                                    <tr style="line-height: 4mm">
                                        <td colspan="3" style=" text-align: center; border: none;">
                                            *HADIR TUGAS 30 MINIT AWAL UNTUK TAKLIMAT,DAN KELUAR TUGAS 15 MINIT SEBELUM WAKTU SEBENAR*
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </td>
                    </tr>

                    <tr style="line-height: 15mm">
                        <td colspan="3" class="no_border">&nbsp;</td>
                    </tr>
                    <tr style="line-height: 4mm">
                        <td class="no_border" style=" text-align: center; border: none;">
                            PENGATUR TUGAS <br>
                            (ROHAIZI BIN OTHMAN)&nbsp;SJN125560 <br>
                            SALINAN:
                        </td>
                        <td class="no_border">&nbsp;</td>
                        <td class="no_border" style=" text-align: center;">
                            ........................T.T.............................. <br>
                            (MOHAMMAD KHALIL BIN KHALID) <br>
                            ASP <br>
                            KETUA UNIT MPV, BPJKK <br>
                            IPD KOTA SETAR
                        </td>
                    </tr>


                </tbody>
            </table>
        {{-- </main> --}}


    </div>

    <div class="table_kedua">
        <table class="no_border">
            <tbody >
                <tr>
                    <td class="no_border" style="text-align: center; vertical-align: middle; ">
                        <u><b><p style="font-size: 10pt">TUGAS PATROLMEN MENGIKUT SOP MPV</p></b></u>
                    </td>
                </tr>
            </tbody>
        </table>

        <br>

        <table class="no_border mt-5">
            <tbody>
                <tr>
                    <td class="no_border">
                        Dalam penugasan MPV, Patrolmen I bertanggungjawab sebagai pemandu dan mengetuai tugas/operasi MPV.Patrolmen II bertanggungjawab sebagai pelindung dan pembantu. Semua Patrolmen bertanggungjawab untuk melaksanakan tugas seperti berikut:
                    </td>
                </tr>
            </tbody>
        </table>

        <br>

        <b><p>1. &nbsp; Sebelum Keluar Tugas:</p></b>
        <br>
        <table>
            <tbody>
                <tr>
                    <td width=5% class="textCtr">BIL</td>
                    <td  class="textCtr">TINDAKAN</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">1</td>
                    <td class="list_sop">Hadirtugas 30 minit untuk di taklimat,keluar tugas 15 minit sebelum waktu sebenar dan balik 15 minit selepas waktu sebenar;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">2</td>
                    <td class="list_sop">Ambil senjatapi dan peluru mengiku tskala yang ditetapkan,cara penggunaanya mengikut PTKPN A144 Penggunaan dan Penjagaan Keselamatan Senjata Api oleh Pegawai Polis;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">3</td>
                    <td class="list_sop">Terima arahan tugas semasa Taklimat Penyelia,catit di dalam Buku Saku (POL.5) arahan yang di terima dan wang saku yang di bawa (Tidak melebihi Rm 50.00);
                        <b>Penyelia shift pastikan semua pemandu kenderaan buat catitan dalam buku log kunci kenderaan setiap kali keluar tugas dan selesai tugas.</b></td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">4</td>
                    <td class="list_sop">Penyelia shif buat pemeriksaan dari segi keterampilan diri,kelengkapan/peralatan kenderaan dan kenderaan bagi memastikan ia dalam keadaan baik dan siapsedia digunakan untuk penugasan rondaan mpv;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">5</td>
                    <td class="list_sop">Pastikan Beg MPV dibawa semasa kelua rtugas dan juga pastikan di dalamnya mengandungi,POL.40,POL.55,POL.155.Buku Lawatan (Pemeriksaan Pegawai/ Penyelia), Buku Teguran dan Buku Hebahan;</td>
                </tr>
            </tbody>
        </table>

        <br>

        <b><p>2. &nbsp; Semasa Bertugas:</p></b>
        <br>
        <table>
            <tbody>
                <tr>
                    <td width=5% class="textCtr">BIL</td>
                    <td  class="textCtr">TINDAKAN</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">1</td>
                    <td  class="list_sop">Bawa Portable Radio,lapor keluar tugas dan lapor lokasi 30 minit sekali sepanjang tempoh penugasan ke DCC KOTA SETAR,dan catit di dalam Polis 155;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">2</td>
                    <td  class="list_sop">Setiap tindakan yang diambil keatas mana-mana individu / kenderaan yang diperiksa,samada melalui STAR 54 atau tidak,hendaklah dicatit butiran/tindakan yang telah diambil didalam Polis 40 dan Polis 155.serta lapor lokasi pemeriksaan tersebut ke DCC;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">3</td>
                    <td  class="list_sop">Berhenti dalam tempoh lebih kurang 30 minit di <b><i>conferencing point</i></b> dan <b><i>converging point</i></b> seperti mana yang telah ditetapkan untuk tujuan kempen pencegahan jenayah;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">4</td>
                    <td  class="list_sop">Segera mengambil tindakan terhadap sesuatu insiden atau maklumat awam atau arahan yang diterima dari DCC/CCC. Tempoh tindakbalas (response time) ini hendaklah tidak melebihi 8-15 minit mengikut keadaan muka bumi setempat;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">5</td>
                    <td  class="list_sop">Setiap tindakan yang hendak diambil mesti berpandukan kepada Standard Order Procedur (SOP) dan Manual Prosedur Kerja (MPK) yang telah ditetapkan;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">6</td>
                    <td  class="list_sop">Tidak dibenar meninggalkan kenderaan dalam apa-apa situasi sekali pun, melainkan dalam keadaan kecemasan. Tentukan enjin kenderaan dimatikan dan dikunci jika memerlukan kenderaan ditinggalkan,dan anggota bertugas sama sekali tidak dibenarkan keluar dari zon rondaan kecuali dengan arahan;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">7</td>
                    <td  class="list_sop">Tidak di benarkan membawa OKT didalam kenderaan MPV.Semua tangkapan hendaklah di bawa dengan kenderaan dari elemen Balai berhampiran atau mana-
                        mana kenderaan yang di khaskan. Jika sekiranya keadaan memerlukan tangkapan di bawa segera menggunakan MPV, keselamatan Patrolmen dan kenderaan MPV hendaklah di berikan keutamaan;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">8</td>
                    <td  class="list_sop"><b>Orang kurang siuman,mabuk</b> atau <b>mengamuk</b>, tidak dibenarkan sama sekali di bawa di dalam kenderaan MPV;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">9</td>
                    <td  class="list_sop">Semasa menjalankan tugas pastikan keselamatan diri (Patrolmen 1,Patrolmen 2) serta kenderaan pasukan (MPV);</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">10</td>
                    <td  class="list_sop">Semua tindakan daripada maklumat yang di terima oleh Patrolmen sebagai maklumat pertama selain daripada maklumat yang disalurkan daripada DCC/CCC mestilah di buat laporan polis;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">11</td>
                    <td  class="list_sop">Sepanjang masa bertugas, Patrolmen di kehendaki sentiasa mengekalkan tahap disiplin pasukan yang tinggi, berhemah dan berintergriti;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">12</td>
                    <td  class="list_sop">Kes kes menarik perhatian, lapor segera kepada KBPJKK dan KETUA UNIT MPV;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">13</td>
                    <td  class="list_sop">Lampu Beacon hendaklah di pasang 24 jam.</td>
                </tr>
            </tbody>
        </table>

        <br>

        <b><p>3. &nbsp; Selesai Tugas:</p></b>
        <br>
        <table>
            <tbody>
                <tr>
                    <td width=5% class="textCtr">BIL</td>
                    <td  class="textCtr">TINDAKAN</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">1</td>
                    <td class="list_sop">Lapor taklimat balas semua tindakan yang telah di ambil sepanjang masa penugasan;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">2</td>
                    <td class="list_sop">Taklimat berkaitan dengan semua perkara menarik perhatian / kejadian yang luar biasa semasa bertugas;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">3</td>
                    <td class="list_sop">Mengemaskinikan semua dokumen/andar andar penugasan untuk diserah kepada Petugas Pejabat Operasi mpv,bagi tujuan reten reten harian;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">4</td>
                    <td class="list_sop">Serah kembali senjatapi dan peluru yang di pinjamkan dari Amra IPD;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">5</td>
                    <td class="list_sop">Lapor kepada Penyelia setelah tindakan di atas di ambil;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">6</td>
                    <td class="list_sop">Pastikan bahan api sentiasa penuh dan kenderaan mpv di dalam keadaan bersih dan bebas daripada kerosakan sebelum di letakkan di petak yang di sediakan serta <b>serah kunci kenderaan mpv untuk simpanan di peti simpanan kunci pejabat operasi mpv</b>;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">7</td>
                    <td class="list_sop">Membuat laporan ke atas tindakan-tindakan yang memerlukan laporan polis;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">8</td>
                    <td class="list_sop">Jika sekiranya berlaku insiden-insiden yang memerlukan tindakan segera, Patrolmen hendaklah melaporkan ke DCC/CCC untuk mendapatkan arahan dan bantuan selanjutnya;</td>
                </tr>
            </tbody>
        </table>

        <br>

        <div class="arahan_khas" style="text-align: center">
            <b><p>ARAHAN - ARAHAN KHAS :</p></b>
        </div>
        <br>
        <table>
            <tbody>
                <tr>
                    <td width=5% class="textCtr">BIL</td>
                    <td  class="textCtr">TINDAKAN</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">1</td>
                    <td  class="list_sop">Lawatan dan rondaan kerap di Jabatan Kimia Alor Setar terutama di waktu malam dan awal pagi. Lapor perkembangan 2jam sekali ke DCC tanpa gagal</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">2</td>
                    <td  class="list_sop">Kerapkan rondaan di taman-taman perumahan dan jalankan konsep <b><i>Stop and Talk</i></b> serta <b><i>Meet and Greet</i></b> dengan penghuni dan anggota KRT, SRS, KMK yang bertugas;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">3</td>
                    <td  class="list_sop">Patrolmen diarahkan untuk membuat <b>lawatan</b> kerumah-rumah ibadat seperti <b>masjid, surau, tokong, kuil, gereja, gudwara</b> dan lain-lain rumah ibadat. Dapatkan apa-apa maklumat serta pandangan dari pada penjaga dan pengunjung di tempat-tempat tersebut;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">4</td>
                    <td  class="list_sop"><b><i>Omni-Presence</i></b> di tempat tumpuan ramai seperti gedung-gedung perniagaan, bank-bank, kedai emas/pajak gadai, kedai 24 Jam dan stesen minyak di kawasan rondaan. Jalankan konsep Stop and Talk dan Meet and Greet di kawasan yang dilawati;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">5</td>
                    <td  class="list_sop">Lawatan kerumah VVIP, kediaman Menteri Besar Kedah, kediaman Ketua Polis Kedah, kediaman Timbalan Ketua Polis Kedah dan lain-lain kediaman yang telah ditetapkan di kawasan rondaan masing-masing;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">6</td>
                    <td  class="list_sop">Lawatan ke bangunan-bangunan kerajaan dan lokasi sasaran sasaran penting dalam kawasan rondaan seperti tangki-tangki air, pencawang/jana kuasa elektrik dan lain-lain;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">7</td>
                    <td  class="list_sop">Lawatan kerumah-rumah atau kediaman yang di tinggalkan kosong oleh penghuni ketika bercuti. Semak alamat di Pejabat Operasi MPV bagi mendapatkan senarai tersebut;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">8</td>
                    <td  class="list_sop">Selalu menampakkan MPV di jalan raya serta tingkatkan pemeriksaan ke atas individu / kenderaan di kawasan rondaan;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">9</td>
                    <td  class="list_sop"><b><i>Beacon Light</i></b> hendaklah di pasang ketika rondaan di malam hari terutama rondaan di taman-taman perumahan, kawasan Bandar, tempat tumpuan ramai dan rondaan di kawasan gelap;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">10</td>
                    <td  class="list_sop">Patrolmen diarahkan tidak memakai cermin mata gelap ketika berkomunikasi dengan orang ramai dalam konsep Stop and Talk dan Meet and Greet dan sebagainya;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">11</td>
                    <td  class="list_sop">Penggunaan senjatapi hendaklah mengikut PTKPN A144 Penggunaan dan Penjagaan Keselamatan Senjata Api oleh Pegawai Polis;. Membawa senjatapi beserta seperti Pistol Revolver .38, Walther P99 dan MP5;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">12</td>
                    <td  class="list_sop">Pemakaian <b><i>Vest Polis</i></b> semasa penugasan siang dan malam;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">13</td>
                    <td  class="list_sop">Sentiasa membawa Buku Saku semasa penugasan dan catatan yang dikemaskini;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">14</td>
                    <td  class="list_sop">Anggota yang bercuti diarahkan mengambil POL 7 dan POL 134 jika keluar daerah;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">15</td>
                    <td  class="list_sop">Penyaraan MPV sebulan (1) sekali dan Spectra setiap tiga (3) bulan sekali;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">16</td>
                    <td  class="list_sop"><b>General Roll Call</b> setiap dua (1) minggu sekali – kehadiran di wajibkan;</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">17</td>
                    <td  class="list_sop">Lawatan dan rondaan secara berkala di permis-permis Kerajaan (SekLat.AnakBukit.UTC)dan lapor kepada DCC Setar</td>
                </tr>
                <tr>
                    <td width=5% class="textCtr">18</td>
                    <td  class="list_sop">Lawatan <b>BANK/KEDAI EMAS/PAJAK GADAI</b>.Petrolman perlu melawat dan berjumpa Pemilik / penjaga permis dan buat catitan di dalam buku <b>lawatan polis</b>
                        yang disediakan dan lapor ke DCC Setar.</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
