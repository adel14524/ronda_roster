@extends('admin.admin_master')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="card-header text-center bg-info text-light">BORANG JADUAL TUGAS</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('rosters.store') }}" method="POST" id="CreateRosterForm" enctype="multipart/form-data">
                        <div class="row mb-4">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="pindaan">Pindaan</label>
                                    <input type="text" id="pindaan" name="pindaan" class="form-control" placeholder="Contoh: Pol 69) (Pindaan 1/71)" required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="pindaan">Tarikh Mula</label>
                                    <input type="date" id="tarikhMula" name="tarikhMula" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="pindaan">Pindaan</label>
                                    <input type="date" id="tarikhHabis" name="tarikhHabis" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <br>
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills nav-justified" role="tablist">
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link active" data-bs-toggle="tab" href="#jadualUnitMPV" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block"><strong>JADUAL UNIT MPV</strong></span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="tab" href="#lainPenugasan" role="tab">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block"><strong>LAIN-LAIN PENUGASAN</strong></span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="tab" href="#rondaShiftZone" role="tab">
                                    <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                    <span class="d-none d-sm-block"><strong>RONDA SHIFT ZONE</strong></span>
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">

                            {{-- Jadual unit MPV --}}
                            <div class="tab-pane active" id="jadualUnitMPV" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body"><br>
                                                <div class="row mb-3">
                                                    <label for="ketuaUnitMpv" class="col-sm-3 col-form-label">KETUA UNIT MPV</label>
                                                    <div class="col-sm-9">
                                                        <select class="js-select-single form-control" name="ketuaUnitMpv" id="ketuaUnitMpv" data-allow-clear="true">
                                                            <option value="" selected>Sila Pilih </option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}" class="selected-officer"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="sarjanMejarMpv" class="col-sm-3 col-form-label">SARJAN MEJAR MPV</label>
                                                    <div class="col-sm-9">
                                                        <select class="js-select-single form-control" name="sarjanMejarMpv" id="sarjanMejarMpv" data-allow-clear="true">
                                                            <option value="" selected>Sila Pilih </option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="sarjanPentadbiranBpjkk" class="col-sm-3 col-form-label">SARJAN PENTADBIRAN BPJKK</label>
                                                    <div class="col-sm-9">
                                                        <select class="js-select-single form-control" name="PentadbiranBpjkk" id="sarjanPentadbiranBpjkk" data-allow-clear="true">
                                                            <option value="" selected>Sila Pilih </option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="pengaturTugas" class="col-sm-3 col-form-label">PENGATUR TUGAS</label>
                                                    <div class="col-sm-9">
                                                        <select class="js-select-single form-control" name="pengaturTugas" id="pengaturTugas" data-allow-clear="true">
                                                            <option value="" selected>Sila Pilih </option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="penyeliaKenderaan" class="col-sm-3 col-form-label">PENYELIA KENDERAAN/ POL 200</label>
                                                    <div class="col-sm-9">
                                                        <select class="js-select-single form-control" name="penyeliaKenderaan" id="penyeliaKenderaan" data-allow-clear="true">
                                                            <option value="" selected>Sila Pilih </option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="pejabatBpjkk" class="col-sm-3 col-form-label">PEJABAT BPJKK</label>
                                                    <div class="col-sm-9">
                                                        <select class="js-select-mult form-control" data-placeholder="Sila Pilih" name="pejabatBpjkk[]" id="pejabatBpjkk" data-allow-clear="true" multiple="multiple">
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="tugasDespatch" class="col-sm-3 col-form-label">TUGAS DESPATCH</label>
                                                    <div class="col-sm-9">
                                                        <select class="js-select-single form-control" name="tugasDespatch" id="tugasDespatch" data-allow-clear="true">
                                                            <option value="" selected>Sila Pilih </option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <h5 class="card-header">CUTI</h5>
                                            <div class="card-body"><br>
                                                <div class="row mb-4">
                                                    <div class="form-group col-md-4">
                                                        <label for="anggotaCuti">Anggota</label>
                                                        <select id="anggotaCuti" name="anggotaCuti1" class="js-select-single form-control">
                                                            <option value="" selected>Sila Pilih </option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="startDate">Tarikh Mula Cuti</label>
                                                        <input type='date' class="form-control" id="startDateCuti" name="startDateCuti1" placeholder="Masukkan tarikh mula cuti" />
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="endDate">Tarikh Tamat Cuti</label>
                                                        <div class="input-group">
                                                            <input type="date" class="form-control" id="endDateCuti" name="endDateCuti1" placeholder="Masukkan tarikh tamat cuti">
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-success buttonAdd " id="AddCuti" value="2" type="button"><i class="fas fa-plus mt-2"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="countCuti" name="countCuti" value="1">
                                                    <div class="tambahCuti"></div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <small>
                                                    <span style="color: red; font-weight: bold;">**&nbsp;&nbsp;</span>Sila tekan butang&nbsp;&nbsp;
                                                </small>
                                                <i class="dripicons-plus"></i>
                                                <small>
                                                    &nbsp;&nbsp;untuk mengisi/menambah cuti anggota lainnya,&nbsp;
                                                </small>
                                                <small>
                                                    dan tekan butang&nbsp;&nbsp;
                                                </small>
                                                <i class="dripicons-minus"></i>
                                                <small>
                                                    &nbsp;&nbsp;untuk padam/buang borang.
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <h5 class="card-header">CUTI SAKIT</h5>
                                            <div class="card-body"><br>
                                                <div class="row mb-4">
                                                    <div class="form-group col-md-4">
                                                        <label for="anggotaCutiSakit">Anggota</label>
                                                        <select id="anggotaCutiSakit" name="anggotaCutiSakit" class="js-select-single form-control">
                                                            <option value="" selected>Sila Pilih </option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="startDate">Tarikh Mula Cuti</label>
                                                        <input type='date' class="form-control" id="startDateSakit" name="startDateSakit1" placeholder="Masukkan tarikh mula cuti" />
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="endDate">Tarikh Tamat Cuti</label>
                                                        <div class="input-group">
                                                            <input type="date" class="form-control" id="endDateSakit" name="endDateSakit1" placeholder="Masukkan tarikh tamat cuti">
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-success buttonAdd " id="AddSakit" value="2" type="button"><i class="fas fa-plus mt-2"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="countCutiSakit" name="countCutiSakit" value="1">
                                                    <div id="tambahSakit"></div>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <small>
                                                    <span style="color: red; font-weight: bold;">**&nbsp;&nbsp;</span>Sila tekan butang&nbsp;&nbsp;
                                                </small>
                                                <i class="dripicons-plus"></i>
                                                <small>
                                                    &nbsp;&nbsp;untuk mengisi/menambah cuti anggota lainnya,&nbsp;
                                                </small>
                                                <small>
                                                    dan tekan butang&nbsp;&nbsp;
                                                </small>
                                                <i class="dripicons-minus"></i>
                                                <small>
                                                    &nbsp;&nbsp;untuk padam/buang borang.
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body"><br>
                                                <div class="row mb-4">
                                                    <div class="form-group col-md-6">
                                                        <label for="startDate">BILIK OPERASI/ PENTADBIRAN OPERASI</label>
                                                        <select name="operasi_pentadbiran[]" class="js-select-mult form-control"  data-placeholder="Sila Pilih" multiple="multiple">
                                                            <option></option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="startDate">KELEPASAN PENYELIA MPV</label>
                                                        <select name="penyelia_mpv[]" class="js-select-mult form-control"  data-placeholder="Sila Pilih" multiple="multiple">
                                                            <option></option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <h5 class="card-header">PENYELIA MPV (SETAR 22 A)</h5>
                                            <div class="card-body"><br>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <h6 class="d-flex justify-content-center">&nbsp;</h6>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <h6 class="d-flex justify-content-center">SYIF 1</h6>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <h6 class="d-flex justify-content-center">SYIF 2</h6>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <h6 class="d-flex justify-content-center">SYIF 3</h6>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-sm-2">
                                                        <h6 class="d-flex justify-content-center">&nbsp;</h6>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <h6 class="d-flex justify-content-center">0800HRS - 1600HRS</h6>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <h6 class="d-flex justify-content-center">1600HRS - 0000HRS</h6>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <h6 class="d-flex justify-content-center">0001HRS - 0800HRS</h6>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-sm-2">
                                                        <h6 class="d-flex justify-content-center">Co-Pilot</h6>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <select class="js-select-single form-control" name="syif_0816_co" data-allow-clear="true">
                                                            <option value="" selected>Sila Pilih </option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <select class="js-select-single form-control" name="syif_1600_co" data-allow-clear="true">
                                                            <option value="" selected>Sila Pilih </option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <select class="js-select-single form-control" name="syif_0008_co" data-allow-clear="true">
                                                            <option value="" selected>Sila Pilih </option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-sm-2">
                                                        <h6 class="d-flex justify-content-center">Pilot</h6>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <select class="js-select-single form-control" name="syif_0816_pilot" data-allow-clear="true">
                                                            <option value="" selected>Sila Pilih </option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <select class="js-select-single form-control" name="syif_1600_pilot" data-allow-clear="true">
                                                            <option value="" selected>Sila Pilih </option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <select class="js-select-single form-control" name="syif_0008_pilot" data-allow-clear="true">
                                                            <option value="" selected>Sila Pilih </option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-sm-2">
                                                        <h6 class="d-flex justify-content-center">Kereta</h6>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <select class="js-select-single form-control" name="syif_0816_kereta" data-allow-clear="true">
                                                            <option value="" selected>Sila Pilih </option>
                                                            @foreach (App\Models\Car::get() as $car)
                                                                <option value="{{ $car->id }}"> ({{ $car->code }}) {{ $car->no_plate }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <select class="js-select-single form-control" name="syif_1600_kereta" data-allow-clear="true">
                                                            <option value="" selected>Sila Pilih </option>
                                                            @foreach (App\Models\Car::get() as $car)
                                                                <option value="{{ $car->id }}"> ({{ $car->code }}) {{ $car->no_plate }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <select class="js-select-single form-control" name="syif_0008_kereta" data-allow-clear="true">
                                                            <option value="" selected>Sila Pilih </option>
                                                            @foreach (App\Models\Car::get() as $car)
                                                                <option value="{{ $car->id }}"> ({{ $car->code }}) {{ $car->no_plate }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Lain2 Penugasan --}}
                            <div class="tab-pane" id="lainPenugasan" role="tabpanel">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <h5 class="card-header">LAWATAN LOKASI</h5>
                                            <div class="card-body"><br>
                                                <div class="row mb-4">
                                                    <div class="form-group col-md-7 col-sm-6">
                                                        <label for="startDate">Lawatan Lokasi Sasaran Penting</label>
                                                        <input type='text' class="form-control penugasan" id="penugasan"name="penugasan1" placeholder="Masukkan Jenis Penugasan berserta tarikh jika ada" />
                                                    </div>

                                                    <div class="form-group col-md-5 col-sm-6">
                                                        <label for="inputEmail4">Tindakan Penyelia Syif</label>
                                                        <div class="input-group">
                                                            <select class="js-select-mult form-control" data-placeholder="Sila Pilih" name="pegawaiPenugasan1[]" data-allow-clear="true" multiple="multiple" style="width: 90%;">
                                                                @foreach (App\Models\Officer::get() as $officer)
                                                                    <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="input-group-btn">
                                                                <a class="btn btn-sm btn-success" id="AddTugas" value="2" type="button"><i class="fas fa-plus mt-2"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="countTugas" id="countTugas" value="1">
                                                    <div id="tambahTugas"></div>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <small>
                                                    <span style="color: red; font-weight: bold;">**&nbsp;&nbsp;</span>Sila tekan butang&nbsp;&nbsp;
                                                </small>
                                                <i class="dripicons-plus"></i>
                                                <small>
                                                    &nbsp;&nbsp;untuk mengisi/menambah cuti anggota lainnya,&nbsp;
                                                </small>
                                                <small>
                                                    dan tekan butang&nbsp;&nbsp;
                                                </small>
                                                <i class="dripicons-minus"></i>
                                                <small>
                                                    &nbsp;&nbsp;untuk padam/buang borang.
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <h5 class="card-header">KELEPASAN / STANDBY</h5>
                                            <div class="card-body"><br>
                                                <div class="row mb-4">
                                                    <label for="ketuaUnitMpv" class="col-sm-2 col-form-label text-center">PILIH ANGGOTA</label>
                                                    <div class="col-sm-10">
                                                        <select class="js-select-mult form-control" data-placeholder="Sila Pilih" name="pegawaiKelepasan[]" multiple="multiple" data-allow-clear="true" style="width: 100%;">
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Ronda Shift Zone --}}
                            <div class="tab-pane" id="rondaShiftZone" role="tabpanel">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <h5 class="card-header">MPV ZON “A & B”</h5>
                                            <div class="card-body"><br>
                                                <div class="row mb-4">
                                                    <h5 class="mb-4">0800HRS - 1600HRS</h5>
                                                    <div class="form-group col-md-4">
                                                        <label for="ronda_AB0816_Co_id">Co-Pilot (C)</label>
                                                        <select id="ronda_AB0816_Co_id" name="ronda_AB0816_Co1" class="js-select-single form-control" style="width: 100%;">
                                                            <option value="" selected>Sila Pilih </option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="ronda_AB0816_Pi">Pilot (P)</label>
                                                        <select id="ronda_AB0816_Pi" name="ronda_AB0816_Pi1" class="js-select-single form-control" style="width: 100%;">
                                                            <option value=""></option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="ronda_AB0816_Kereta1">Kereta</label>
                                                        <div class="input-group">
                                                            <select id="ronda_AB0816_Kereta1" name="ronda_AB0816_Kereta1" class="js-select-single form-control" style="width: 90%;">
                                                                <option value=""></option>
                                                                @foreach (App\Models\Car::get() as $car)
                                                                <option value="{{ $car->id }}">({{ $car->code }}) {{ $car->no_plate }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-sm btn-success buttonAdd" id="Addronda_AB0816" data-group="AB0816" value="2" type="button"><i class="fas fa-plus mt-2"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="tambahronda_AB0816"></div>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <div class="row mb-4">
                                                    <h5 class="mb-4">1600HRS – 0000HRS</h5>
                                                    <div class="form-group col-md-4">
                                                        <label for="ronda_AB1600_Co">Co-Pilot (C)</label>
                                                        <select id="ronda_AB1600_Co" name="ronda_AB1600_Co1" class="js-select-single form-control" style="width: 100%;">
                                                            <option value="" selected>Sila Pilih </option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="ronda_AB1600_Pi">Pilot (P)</label>
                                                        <select id="ronda_AB1600_Pi" name="ronda_AB1600_Pi1" class="js-select-single form-control" style="width: 100%;">
                                                            <option value=""></option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="ronda_AB1600_Kereta1">Kereta</label>
                                                        <div class="input-group">
                                                            <select id="ronda_AB1600_Kereta1" name="ronda_AB1600_Kereta1" class="js-select-single form-control" style="width: 90%;">
                                                                <option value=""></option>
                                                                @foreach (App\Models\Car::get() as $car)
                                                                <option value="{{ $car->id }}">({{ $car->code }}) {{ $car->no_plate }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-sm btn-success buttonAdd" id="Addronda_AB1600" data-group="AB1600" value="2" type="button"><i class="fas fa-plus mt-2"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="tambahronda_AB1600"></div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <div class="row mb-4">
                                                    <h5 class="mb-4">0001HRS – 0800HRS</h5>
                                                    <div class="form-group col-md-4">
                                                        <label for="ronda_AB0008_Co">Co-Pilot (C)</label>
                                                        <select id="ronda_AB0008_Co" name="ronda_AB0008_Co1" class="js-select-single form-control" style="width: 100%;">
                                                            <option value="" selected>Sila Pilih </option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="ronda_AB0008_Pi">Pilot (P)</label>
                                                        <select id="ronda_AB0008_Pi" name="ronda_AB0008_Pi1" class="js-select-single form-control" style="width: 100%;">
                                                            <option value=""></option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="ronda_AB0008_Kereta1">Kereta</label>
                                                        <div class="input-group">
                                                            <select id="ronda_AB0008_Kereta1" name="ronda_AB0008_Kereta1" class="js-select-single form-control" style="width: 90%;">
                                                                <option value=""></option>
                                                                @foreach (App\Models\Car::get() as $car)
                                                                <option value="{{ $car->id }}">({{ $car->code }}) {{ $car->no_plate }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-sm btn-success buttonAdd" id="Addronda_AB0008" data-group="AB0008" value="2" type="button"><i class="fas fa-plus mt-2"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="tambahronda_AB0008"></div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <small>
                                                    <span style="color: red; font-weight: bold;">**&nbsp;&nbsp;</span>Sila tekan butang&nbsp;&nbsp;
                                                </small>
                                                <i class="dripicons-plus"></i>
                                                <small>
                                                    &nbsp;&nbsp;untuk mengisi/menambah cuti anggota lainnya,&nbsp;
                                                </small>
                                                <small>
                                                    dan tekan butang&nbsp;&nbsp;
                                                </small>
                                                <i class="dripicons-minus"></i>
                                                <small>
                                                    &nbsp;&nbsp;untuk padam/buang borang.
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <h5 class="card-header">MPV ZON “C & D”</h5>
                                            <div class="card-body"><br>
                                                <div class="row mb-4">
                                                    <h5 class="mb-4">0800HRS - 1600HRS</h5>
                                                    <div class="form-group col-md-4">
                                                        <label for="ronda_CD0816_Co_id">Co-Pilot (C)</label>
                                                        <select id="ronda_CD0816_Co_id" name="ronda_CD0816_Co1" class="js-select-single form-control" style="width: 100%;">
                                                            <option value="" selected>Sila Pilih </option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="ronda_CD0816_Pi">Pilot (P)</label>
                                                        <select id="ronda_CD0816_Pi" name="ronda_CD0816_Pi1" class="js-select-single form-control" style="width: 100%;">
                                                            <option value=""></option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="ronda_CD0816_Kereta1">Kereta</label>
                                                        <div class="input-group">
                                                            <select id="ronda_CD0816_Kereta1" name="ronda_CD0816_Kereta1" class="js-select-single form-control" style="width: 90%;">
                                                                <option value=""></option>
                                                                @foreach (App\Models\Car::get() as $car)
                                                                <option value="{{ $car->id }}">({{ $car->code }}) {{ $car->no_plate }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-sm btn-success buttonAdd" id="Addronda_CD0816" data-group="CD0816" value="2" type="button"><i class="fas fa-plus mt-2"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="tambahronda_CD0816"></div>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <div class="row mb-4">
                                                    <h5 class="mb-4">1600HRS – 0000HRS</h5>
                                                    <div class="form-group col-md-4">
                                                        <label for="ronda_CD1600_Co">Co-Pilot (C)</label>
                                                        <select id="ronda_CD1600_Co" name="ronda_CD1600_Co1" class="js-select-single form-control" style="width: 100%;">
                                                            <option value="" selected>Sila Pilih </option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="ronda_CD1600_Pi">Pilot (P)</label>
                                                        <select id="ronda_CD1600_Pi" name="ronda_CD1600_Pi1" class="js-select-single form-control" style="width: 100%;">
                                                            <option value=""></option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="ronda_CD1600_Kereta1">Kereta</label>
                                                        <div class="input-group">
                                                            <select id="ronda_CD1600_Kereta1" name="ronda_CD1600_Kereta1" class="js-select-single form-control" style="width: 90%;">
                                                                <option value=""></option>
                                                                @foreach (App\Models\Car::get() as $car)
                                                                <option value="{{ $car->id }}">({{ $car->code }}) {{ $car->no_plate }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-sm btn-success buttonAdd" id="Addronda_CD1600" data-group="CD1600" value="2" type="button"><i class="fas fa-plus mt-2"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="tambahronda_CD1600"></div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <div class="row mb-4">
                                                    <h5 class="mb-4">0001HRS – 0800HRS</h5>
                                                    <div class="form-group col-md-4">
                                                        <label for="ronda_CD0008_Co">Co-Pilot (C)</label>
                                                        <select id="ronda_CD0008_Co" name="ronda_CD0008_Co1" class="js-select-single form-control" style="width: 100%;">
                                                            <option value="" selected>Sila Pilih </option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="ronda_CD0008_Pi">Pilot (P)</label>
                                                        <select id="ronda_CD0008_Pi" name="ronda_CD0008_Pi1" class="js-select-single form-control" style="width: 100%;">
                                                            <option value=""></option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="ronda_CD0008_Kereta1">Kereta</label>
                                                        <div class="input-group">
                                                            <select id="ronda_CD0008_Kereta1" name="ronda_CD0008_Kereta1" class="js-select-single form-control" style="width: 90%;">
                                                                <option value=""></option>
                                                                @foreach (App\Models\Car::get() as $car)
                                                                <option value="{{ $car->id }}">({{ $car->code }}) {{ $car->no_plate }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-sm btn-success buttonAdd" id="Addronda_CD0008" data-group="CD0008" value="2" type="button"><i class="fas fa-plus mt-2"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="tambahronda_CD0008"></div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <small>
                                                    <span style="color: red; font-weight: bold;">**&nbsp;&nbsp;</span>Sila tekan butang&nbsp;&nbsp;
                                                </small>
                                                <i class="dripicons-plus"></i>
                                                <small>
                                                    &nbsp;&nbsp;untuk mengisi/menambah cuti anggota lainnya,&nbsp;
                                                </small>
                                                <small>
                                                    dan tekan butang&nbsp;&nbsp;
                                                </small>
                                                <i class="dripicons-minus"></i>
                                                <small>
                                                    &nbsp;&nbsp;untuk padam/buang borang.
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <h5 class="card-header">MPV ZON “E & F”</h5>
                                            <div class="card-body"><br>
                                                <div class="row mb-4">
                                                    <h5 class="mb-4">0800HRS - 1600HRS</h5>
                                                    <div class="form-group col-md-4">
                                                        <label for="ronda_EF0816_Co_id">Co-Pilot (C)</label>
                                                        <select id="ronda_EF0816_Co_id" name="ronda_EF0816_Co1" class="js-select-single form-control" style="width: 100%;">
                                                            <option value="" selected>Sila Pilih </option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="ronda_EF0816_Pi">Pilot (P)</label>
                                                        <select id="ronda_EF0816_Pi" name="ronda_EF0816_Pi1" class="js-select-single form-control" style="width: 100%;">
                                                            <option value=""></option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="ronda_EF0816_Kereta1">Kereta</label>
                                                        <div class="input-group">
                                                            <select id="ronda_EF0816_Kereta1" name="ronda_EF0816_Kereta1" class="js-select-single form-control" style="width: 90%;">
                                                                <option value=""></option>
                                                                @foreach (App\Models\Car::get() as $car)
                                                                <option value="{{ $car->id }}">({{ $car->code }}) {{ $car->no_plate }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-sm btn-success buttonAdd" id="Addronda_EF0816" data-group="EF0816" value="2" type="button"><i class="fas fa-plus mt-2"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="tambahronda_EF0816"></div>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <div class="row mb-4">
                                                    <h5 class="mb-4">1600HRS – 0000HRS</h5>
                                                    <div class="form-group col-md-4">
                                                        <label for="ronda_EF1600_Co">Co-Pilot (C)</label>
                                                        <select id="ronda_EF1600_Co" name="ronda_EF1600_Co1" class="js-select-single form-control" style="width: 100%;">
                                                            <option value="" selected>Sila Pilih </option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="ronda_EF1600_Pi">Pilot (P)</label>
                                                        <select id="ronda_EF1600_Pi" name="ronda_EF1600_Pi1" class="js-select-single form-control" style="width: 100%;">
                                                            <option value=""></option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="ronda_EF1600_Kereta1">Kereta</label>
                                                        <div class="input-group">
                                                            <select id="ronda_EF1600_Kereta1" name="ronda_EF1600_Kereta1" class="js-select-single form-control" style="width: 90%;">
                                                                <option value=""></option>
                                                                @foreach (App\Models\Car::get() as $car)
                                                                <option value="{{ $car->id }}">({{ $car->code }}) {{ $car->no_plate }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-sm btn-success buttonAdd" id="Addronda_EF1600" data-group="EF1600" value="2" type="button"><i class="fas fa-plus mt-2"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="tambahronda_EF1600"></div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <div class="row mb-4">
                                                    <h5 class="mb-4">0001HRS – 0800HRS</h5>
                                                    <div class="form-group col-md-4">
                                                        <label for="ronda_EF0008_Co">Co-Pilot (C)</label>
                                                        <select id="ronda_EF0008_Co" name="ronda_EF0008_Co1" class="js-select-single form-control" style="width: 100%;">
                                                            <option value="" selected>Sila Pilih </option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="ronda_EF0008_Pi">Pilot (P)</label>
                                                        <select id="ronda_EF0008_Pi" name="ronda_EF0008_Pi1" class="js-select-single form-control" style="width: 100%;">
                                                            <option value=""></option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="ronda_EF0008_Kereta1">Kereta</label>
                                                        <div class="input-group">
                                                            <select id="ronda_EF0008_Kereta1" name="ronda_EF0008_Kereta1" class="js-select-single form-control" style="width: 90%;">
                                                                <option value=""></option>
                                                                @foreach (App\Models\Car::get() as $car)
                                                                <option value="{{ $car->id }}">({{ $car->code }}) {{ $car->no_plate }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-sm btn-success buttonAdd" id="Addronda_EF0008" data-group="EF0008" value="2" type="button"><i class="fas fa-plus mt-2"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="tambahronda_EF0008"></div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <small>
                                                    <span style="color: red; font-weight: bold;">**&nbsp;&nbsp;</span>Sila tekan butang&nbsp;&nbsp;
                                                </small>
                                                <i class="dripicons-plus"></i>
                                                <small>
                                                    &nbsp;&nbsp;untuk mengisi/menambah cuti anggota lainnya,&nbsp;
                                                </small>
                                                <small>
                                                    dan tekan butang&nbsp;&nbsp;
                                                </small>
                                                <i class="dripicons-minus"></i>
                                                <small>
                                                    &nbsp;&nbsp;untuk padam/buang borang.
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            
        </div>
    </div>
@endsection
