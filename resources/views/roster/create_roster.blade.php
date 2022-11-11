@extends('admin.admin_master')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-warning">
                    <h3 class="card-header text-center bg-warning">BORANG JADUAL TUGAS</h3>
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
                            <div class="tab-pane active" id="jadualUnitMPV" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body"><br>
                                                <div class="row mb-3">
                                                    <label for="ketuaUnitMpv" class="col-sm-3 col-form-label">KETUA UNIT MPV</label>
                                                    <div class="col-sm-9">
                                                        <select class="js-select-single form-control" name="ketuaUnitMpv" id="ketuaUnitMpv" data-allow-clear="true">
                                                            <option>Sila Pilih</option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}" class="selected-officer"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="sarjanMejarMpv" class="col-sm-3 col-form-label">SARJAN MEJAR MPV</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control select2" name="sarjanMejarMpv" id="sarjanMejarMpv" data-allow-clear="true">
                                                            <option>Sila Pilih</option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="row mb-3">
                                                    <label for="sarjanPentadbiranBpjkk" class="col-sm-3 col-form-label">SARJAN PENTADBIRAN BPJKK</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control select2" name="PentadbiranBpjkk" id="sarjanPentadbiranBpjkk" data-allow-clear="true">
                                                            <option>Sila Pilih</option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="row mb-3">
                                                    <label for="pengaturTugas" class="col-sm-3 col-form-label">PENGATUR TUGAS</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control select2" name="pengaturTugas" id="pengaturTugas" data-allow-clear="true">
                                                            <option>Sila Pilih</option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="row mb-3">
                                                    <label for="penyeliaKenderaan" class="col-sm-3 col-form-label">PENYELIA KENDERAAN/ POL 200</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control select2" name="penyeliaKenderaan" id="penyeliaKenderaan" data-allow-clear="true">
                                                            <option>Sila Pilih</option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="pejabatBpjkk" class="col-sm-3 col-form-label">PEJABAT BPJKK</label>
                                                    <div class="col-sm-9">
                                                        <select class="js-select-mult form-control select2-multiple" data-placeholder="Sila Pilih" name="pejabatBpjkk[]" id="pejabatBpjkk" data-allow-clear="true">
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}"> {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="penyeliaKenderaan" class="col-sm-3 col-form-label">PENYELIA KENDERAAN/ POL 200</label>
                                                    <div class="col-sm-9">
                                                        <select class="select2 form-control select2-single" name="penyeliaKenderaan" id="penyeliaKenderaan" data-allow-clear="true">
                                                            <option>Sila Pilih</option>
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
                                            <h5 class="card-header">Cuti</h5>
                                            <div class="card-body"><br>
                                                <div class="row mb-4">
                                                    <div class="form-group col-md-4">
                                                        <label for="anggotaCuti">Anggota</label>
                                                        <select id="anggotaCuti" name="anggotaCuti1" class="select2 js-select-single form-control">
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
                                            <h5 class="card-header">Cuti Sakit</h5>
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
                            </div>

                            <div class="tab-pane" id="lainPenugasan" role="tabpanel">
                                <p class="mb-0">
                                    Food truck fixie locavore, accusamus mcsweeney's marfa nulla
                                    single-origin coffee squid. Exercitation +1 labore velit, blog
                                    sartorial PBR leggings next level wes anderson artisan four loko
                                    farm-to-table craft beer twee. Qui photo booth letterpress,
                                    commodo enim craft beer mlkshk aliquip jean shorts ullamco ad
                                    vinyl cillum PBR. Homo nostrud organic, assumenda labore
                                    aesthetic magna 8-bit.
                                </p>
                            </div>
                            <div class="tab-pane" id="rondaShiftZone" role="tabpanel">
                                <p class="mb-0">
                                    Etsy mixtape wayfarers, ethical wes anderson tofu before they
                                    sold out mcsweeney's organic lomo retro fanny pack lo-fi
                                    farm-to-table readymade. Messenger bag gentrify pitchfork
                                    tattooed craft beer, iphone skateboard locavore carles etsy
                                    salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                                    Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
                                    mi whatever gluten-free.
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card accordion-card shadow p-4">
                <form action="{{ route('rosters.store') }}" method="POST" id="CreateRosterForm" enctype="multipart/form-data">
                    @csrf
                    <div id="accordion">
                        <h2 class="text-center" style="margin-bottom: 60px;">BORANG JADUAL TUGAS</h2>

                        {{-- no pol tarikh mula tarikh akhir --}}
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="pindaan">Pindaan</label>
                                    <input type="text" id="pindaan" name="pindaan" class="form-control" placeholder="Contoh: Pol 69) (Pindaan 1/71)">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="tarikhMula">Tarikh Mula</label>
                                    <input type="date" id="tarikhMula" name="tarikhMula" class="form-control">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="tarikhHabis">Tarikh Habis</label>
                                    <input type="date" id="tarikhHabis" name="tarikhHabis" class="form-control">
                                </div>
                            </div>

                        </div>
                        {{-- no pol tarikh mula tarikh akhir --}}

                        {{-- Jadual unit MPV --}}
                        <div class="card border-0">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <a class="btn btn-link text-decoration-none" href="#collapseOne" role="button"
                                        style="font-size: 17px;color: #000000;font-weight: bold;" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        JADUAL UNIT MPV
                                    </a>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">

                                <div class="card-body">
                                    <div class="card shadow">
                                        {{-- <div class="card-header"></div> --}}
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="ketuaUnitMpv" class="col-sm-3 col-form-label">KETUA UNIT MPV</label>
                                                <div class="col-sm-9">
                                                    <select class="js-select-single form-control" name="ketuaUnitMpv"
                                                        id="ketuaUnitMpv" data-allow-clear="true" style="width: 100%">
                                                        <option value="">Sila pilih</option>
                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}" class="selected-officer"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="sarjanMejarMpv" class="col-sm-3 col-form-label">SARJAN MEJAR
                                                    MPV</label>
                                                <div class="col-sm-9">
                                                    <select class="js-select-single form-control" name="sarjanMejarMpv"
                                                        id="sarjanMejarMpv" data-allow-clear="true" style="width: 100%">
                                                        <option value="">Sila pilih</option>

                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="sarjanPentadbiranBpjkk" class="col-sm-3 col-form-label">SARJAN
                                                    PENTADBIRAN
                                                    BPJKK</label>
                                                <div class="col-sm-9">
                                                    <select class="js-select-single form-control" name="PentadbiranBpjkk"
                                                        id="sarjanPentadbiranBpjkk" data-allow-clear="true" style="width: 100%" >
                                                        <option value="">Sila pilih</option>
                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="pengaturTugas" class="col-sm-3 col-form-label">PENGATUR
                                                    TUGAS</label>
                                                <div class="col-sm-9">
                                                    <select class="js-select-single form-control" name="pengaturTugas"
                                                        id="pengaturTugas" data-allow-clear="true" style="width: 100%">
                                                        <option value="">Sila pilih</option>
                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="penyeliaKenderaan" class="col-sm-3 col-form-label">PENYELIA
                                                    KENDERAAN/ POL
                                                    200</label>
                                                <div class="col-sm-9">
                                                    <select class="js-select-single form-control" name="penyeliaKenderaan"
                                                        id="penyeliaKenderaan" data-allow-clear="true" style="width: 100%">
                                                        <option value="">Sila pilih</option>
                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="pejabatBpjkk" class="col-sm-3 col-form-label">PEJABAT
                                                    BPJKK</label>
                                                <div class="col-sm-9">
                                                    <select class="js-select-mult form-control select2-multiple" name="pejabatBpjkk[]"
                                                        id="pejabatBpjkk" data-allow-clear="true" style="width: 100%" >
                                                        <option value=""></option>
                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="tugasDespatch" class="col-sm-3 col-form-label">TUGAS
                                                    DESPATCH</label>
                                                <div class="col-sm-9">
                                                    <select class="js-select-single form-control" name="tugasDespatch"
                                                        id="tugasDespatch" data-allow-clear="true" style="width: 100%">
                                                        <option value="">Sila pilih</option>
                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr style="margin: 45px 0 20px 0;">

                                <div class="card-body" id="fadeOutdiv">
                                    <div class="card shadow">
                                        <div class="card-header" style="font-size: 17px; font-weight: bold;">Cuti</div>
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="anggotaCuti">Anggota</label>
                                                    <select id="anggotaCuti" name="anggotaCuti1"
                                                        class="js-select-single form-control">
                                                        <option value="" selected>Sila Pilih </option>
                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="startDate">Tarikh Mula Cuti</label>
                                                    <input type='date' class="form-control" id="startDateCuti"
                                                        name="startDateCuti1" placeholder="Masukkan tarikh mula cuti" />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="endDate">Tarikh Tamat Cuti</label>
                                                    <div class="input-group">
                                                        <input type="date" class="form-control" id="endDateCuti"
                                                            name="endDateCuti1" placeholder="Masukkan tarikh tamat cuti">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-success buttonAdd " id="AddCuti"
                                                                value="2" type="button"><i
                                                                    class="fas fa-plus mt-2"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" id="countCuti" name="countCuti" value="1">
                                            <div class="tambahCuti"></div>
                                        </div>
                                        <div class="card-footer">
                                            <small><span style="color: red; font-weight: bold;">**&nbsp;&nbsp;</span>Sila tekan
                                                butang&nbsp;&nbsp;<span class="badge badge-success"><i
                                                        class="fas fa-plus"></i></span>&nbsp;&nbsp;untuk mengisi/menambah cuti
                                                anggota lainnya,&nbsp;</small>
                                            <small>dan tekan butang&nbsp;&nbsp;<span class="badge badge-danger"><i
                                                        class="fas fa-minus"></i></span>&nbsp;&nbsp;untuk padam/buang
                                                borang.</small>
                                        </div>
                                    </div>
                                    <hr style="margin: 45px 0 20px 0;">

                                    <div class="card shadow" style="margin-top: 50px;">
                                        <div class="card-header" style="font-size: 17px; font-weight: bold;">Cuti Sakit</div>
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="anggotaCutiSakit">Anggota</label>
                                                    <select id="anggotaCutiSakit" name="anggotaCutiSakit1"
                                                        class="js-select-single form-control">
                                                        <option value="" selected>Sila Pilih </option>
                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="startDate">Tarikh Mula Cuti</label>
                                                    <input type='date' id="startDateSakit" name="startDateSakit1"
                                                        class="form-control" id="start-date"
                                                        placeholder="Masukkan tarikh mula cuti" />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="endDate">Tarikh Tamat Cuti</label>
                                                    <div class="input-group">
                                                        <input type="date" id="endDateSakit" name="endDateSakit1"
                                                            class="form-control" placeholder="Masukkan tarikh tamat cuti">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-success buttonAdd" id="AddSakit"
                                                                type="button" value="2"><i
                                                                    class="fas fa-plus mt-2"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" id="countCutiSakit" name="countCutiSakit" value="1">
                                            <div id="tambahSakit"></div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="card-footer">
                                            <small><span style="color: red; font-weight: bold;">**&nbsp;&nbsp;</span>Sila tekan
                                                butang&nbsp;&nbsp;<span class="badge badge-success"><i
                                                        class="fas fa-plus"></i></span>&nbsp;&nbsp;untuk mengisi/menambah cuti
                                                anggota lainnya,&nbsp;</small>
                                            <small>dan tekan butang&nbsp;&nbsp;<span class="badge badge-danger"><i
                                                        class="fas fa-minus"></i></span>&nbsp;&nbsp;untuk padam/buang
                                                borang.</small>
                                        </div>
                                    </div>
                                </div>

                                <hr style="margin: 45px 0 20px 0;">

                                <div class="card-body">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-6 pr-3">
                                                    <label for="startDate" class="col-form-label pb-3"
                                                        style="font-size: 17px; font-weight: bold;">BILIK OPERASI/ PENTADBIRAN
                                                        OPERASI</label>
                                                    <select class="js-select-mult form-control" name="operasi_pentadbiran[]"
                                                        style="width: 100%">
                                                        <option></option>
                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6 pl-3">
                                                    <label for="startDate" class="col-form-label pb-3"
                                                        style="font-size: 17px; font-weight: bold;">KELEPASAN PENYELIA
                                                        MPV</label>
                                                    <select class="js-select-mult form-control" name="penyelia_mpv[]"
                                                        style="width: 100%">
                                                        <option></option>
                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr style="margin: 30px 0 30px 0;">

                                <div class="card-body">
                                    <div class="card shadow">
                                        <div class="card-header" style="font-size: 17px; font-weight: bold;">PENYELIA MPV
                                            (SETAR 22 A)</div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-2">
                                                    <h6 class="d-flex justify-content-center">&nbsp;</h6>
                                                    <h6 class="d-flex justify-content-center">&nbsp;</h6>
                                                    <div class="form-group">
                                                        <h5 class="d-flex justify-content-center">Co-Pilot</h5>
                                                    </div>
                                                    <div class="form-group">
                                                        <h5 class="d-flex justify-content-center">Pilot</h5>
                                                    </div>
                                                    <div class="form-group">
                                                        <h5 class="d-flex justify-content-center">Kereta</h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <h6 class="d-flex justify-content-center">SYIF 1</h6>
                                                    <h6 class="d-flex justify-content-center">0800HRS - 1600HRS</h6>
                                                    <div class="form-group">
                                                        <select class="js-select-single" name="syif_0816_co"
                                                            style="width: 100%">
                                                            <option value=""></option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}">
                                                                    {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <select class="js-select-single" name="syif_0816_pilot"
                                                            style="width: 100%">
                                                            <option value=""></option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}">
                                                                    {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <select class="js-select-single" name="syif_0816_kereta"
                                                            style="width: 100%">
                                                            <option value=""></option>
                                                            @foreach (App\Models\Car::get() as $car)
                                                                <option value="{{ $car->id }}"> ({{ $car->code }})
                                                                    {{ $car->no_plate }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <h6 class="d-flex justify-content-center">SYIF 2</h6>
                                                    <h6 class="d-flex justify-content-center">1600HRS - 0000HRS</h6>
                                                    <div class="form-group mb-3" style="margin-bottom: 50px;">
                                                        <select class="js-select-single" name="syif_1600_co"
                                                            style="width: 100%">
                                                            <option value=""></option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}">
                                                                    {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group mb-3" style="margin-bottom: 50px;">
                                                        <select class="js-select-single" name="syif_1600_pilot"
                                                            style="width: 100%">
                                                            <option value=""></option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}">
                                                                    {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group mb-3" style="margin-bottom: 50px;">
                                                        <select class="js-select-single" name="syif_1600_kereta"
                                                            style="width: 100%">
                                                            <option value=""></option>
                                                            @foreach (App\Models\Car::get() as $car)
                                                                <option value="{{ $car->id }}"> ({{ $car->code }})
                                                                    {{ $car->no_plate }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <h6 class="d-flex justify-content-center">SYIF 3</h6>
                                                    <h6 class="d-flex justify-content-center">0001HRS - 0800HRS</h6>
                                                    <div class="form-group">
                                                        <div class="form-group mb-3" style="margin-bottom: 50px;">
                                                            <select class="js-select-single" name="syif_0008_co"
                                                                style="width: 100%">
                                                                <option value=""></option>
                                                                @foreach (App\Models\Officer::get() as $officer)
                                                                    <option value="{{ $officer->id }}">
                                                                        {{ $officer->batch_num }} | {{ $officer->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-group mb-3">
                                                            <select class="js-select-single" name="syif_0008_pilot"
                                                                style="width: 100%">
                                                                <option value=""></option>
                                                                @foreach (App\Models\Officer::get() as $officer)
                                                                    <option value="{{ $officer->id }}">
                                                                        {{ $officer->batch_num }} | {{ $officer->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-group mb-3">
                                                            <select class="js-select-single" name="syif_0008_kereta"
                                                                style="width: 100%">
                                                                <option value=""></option>
                                                                @foreach (App\Models\Car::get() as $car)
                                                                    <option value="{{ $car->id }}">
                                                                        ({{ $car->code }}) {{ $car->no_plate }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <h5 class="text-center title">PENYELIA MPV (SETAR 22 A)</h5> --}}

                            </div>
                        </div>
                        {{-- Jadual unit MPV --}}

                        {{-- Lain2 Penugasan --}}
                        <div class="card border-0">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <a class="btn btn-link collapsed text-decoration-none" href="#" role="button"
                                        style="font-size: 17px;color: #000000;font-weight: bold;" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        LAIN-LAIN PENUGASAN
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">

                                <div class="card-body">
                                    <div class="card shadow">
                                        <div class="card-header" style="font-size: 17px; font-weight: bold;">LAWATAN LOKASI
                                        </div>
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="startDate">Lawatan Lokasi Sasaran Penting</label>
                                                    <input type='text' class="form-control penugasan" id="penugasan"
                                                        name="penugasan1"
                                                        placeholder="Masukkan Jenis Penugasan berserta tarikh jika ada" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Tindakan Penyelia Syif</label>
                                                    <div class="input-group">
                                                        <select class="js-select-mult form-control" name="pegawaiPenugasan1[]"
                                                            style="width: 90%;">
                                                            <option value=""></option>
                                                            @foreach (App\Models\Officer::get() as $officer)
                                                                <option value="{{ $officer->id }}">
                                                                    {{ $officer->batch_num }} | {{ $officer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-success " id="AddTugas" value="2"
                                                                type="button"><i class="fas fa-plus mt-2"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="countTugas" id="countTugas" value="1">
                                            <div id="tambahTugas"></div>

                                            <div class="clear"></div>
                                        </div>
                                        <div class="card-footer">
                                            <small><span style="color: red; font-weight: bold;">**&nbsp;&nbsp;</span>Sila tekan
                                                butang&nbsp;&nbsp;<span class="badge badge-success"><i
                                                        class="fas fa-plus"></i></span>&nbsp;&nbsp;untuk mengisi/menambah
                                                tugasan lain,&nbsp;</small>
                                            <small>dan tekan butang&nbsp;&nbsp;<span class="badge badge-danger"><i
                                                        class="fas fa-minus"></i></span>&nbsp;&nbsp;untuk padam/buang dari
                                                borang.</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="card shadow">
                                        <div class="card-header" style="font-size: 17px; font-weight: bold;">KELEPASAN /
                                            STANDBY
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="ketuaUnitMpv" class="col-sm-3 col-form-label">PILIH
                                                    ANGGOTA</label>
                                                <div class="col-sm-9">
                                                    <select class="js-select-mult form-control" name="pegawaiKelepasan[]"
                                                        multiple="multiple" data-allow-clear="true" style="width: 100%">
                                                        <option value=""></option>
                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
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

                        {{-- Ronda Shift Zone --}}
                        <div class="card border-0">
                            <div class="card-header" id="headingFour">
                                <h5 class="mb-0">
                                    <a class="btn btn-link collapsed text-decoration-none" href="#" role="button"
                                        style="font-size: 17px;color: #000000;font-weight: bold;" data-toggle="collapse"
                                        data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        RONDA SHIFT ZONE
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">

                                <div class="card-body" id="fadeOutdiv">

                                    {{-- MPV ZON “A & B” --}}
                                    <div class="card shadow">
                                        <div class="card-header" style="font-size: 17px; font-weight: bold;">MPV ZON “A & B”
                                        </div>
                                        <div class="card-body">
                                            <u>
                                                <h5>0800HRS -1600HRS</h5>
                                            </u>
                                            <div class="form-row">
                                                <div class="form-group col-4 col-md-4">
                                                    <label for="ronda_AB0816_Co_id">Co-Pilot (C)</label>
                                                    <select id="ronda_AB0816_Co_id" name="ronda_AB0816_Co1" class="js-select-single form-control" style="width: 100%;">
                                                        <option value=""></option>
                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div class="form-group col-4 col-md-4">
                                                    <label for="ronda_AB0816_Pi">Pilot (P)</label>
                                                    <select id="ronda_AB0816_Pi" name="ronda_AB0816_Pi1" class="js-select-single form-control" style="width: 100%;">
                                                        <option value=""></option>
                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-4 col-md-4">
                                                    <label for="ronda_AB0816_Kereta1">Kereta</label>
                                                    <div class="input-group">
                                                        <select id="ronda_AB0816_Kereta1" name="ronda_AB0816_Kereta1" class="js-select-single form-control" style="width: 90%;">
                                                            <option value=""></option>
                                                            @foreach (App\Models\Car::get() as $car)
                                                            <option value="{{ $car->id }}">({{ $car->code }}) {{ $car->no_plate }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-sm btn-success buttonAdd " id="Addronda_AB0816" data-group="AB0816" value="2" type="button"><i class="fas fa-plus mt-2"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="tambahronda_AB0816"></div>
                                        </div>

                                        <div class="card-body">
                                            <u>
                                                <h5>1600HRS– 0000HRS</h5>
                                            </u>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="ronda_AB1600_Co">Co-Pilot (C)</label>
                                                    <select id="ronda_AB1600_Co" name="ronda_AB1600_Co1" class="js-select-single form-control" style="width: 100%;">
                                                        <option value=""></option>
                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="ronda_AB1600_Pi">Pilot (P)</label>
                                                    <select id="ronda_AB1600_Pi" name="ronda_AB1600_Pi1" class="js-select-single form-control" style="width: 100%;">
                                                        <option value=""></option>
                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
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
                                                            <button class="btn btn-sm btn-success buttonAdd " id="Addronda_AB1600" data-group="AB1600"
                                                                value="2" type="button"><i
                                                                    class="fas fa-plus mt-2"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="tambahronda_AB1600"></div>
                                        </div>

                                        <div class="card-body">
                                            <u>
                                                <h5>0001HRS – 0800HRS</h5>
                                            </u>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="ronda_AB0008_Co">Co-Pilot (C)</label>
                                                    <select id="ronda_AB0008_Co" name="ronda_AB0008_Co1" class="js-select-single form-control" style="width: 100%;">
                                                        <option value=""></option>
                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="ronda_AB0008_Pi">Pilot (P)</label>
                                                    <select id="ronda_AB0008_Pi" name="ronda_AB0008_Pi1" class="js-select-single form-control" style="width: 100%;">
                                                        <option value=""></option>
                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
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
                                                            <button class="btn btn-sm btn-success buttonAdd " id="Addronda_AB0008" data-group="AB0008"
                                                                value="2" type="button"><i
                                                                    class="fas fa-plus mt-2"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="tambahronda_AB0008"></div>
                                        </div>

                                        <div class="card-footer">
                                            <small><span style="color: red; font-weight: bold;">**&nbsp;&nbsp;</span>Sila tekan
                                                butang&nbsp;&nbsp;<span class="badge badge-success"><i
                                                        class="fas fa-plus"></i></span>&nbsp;&nbsp;untuk mengisi/menambah
                                                anggota peronda
                                                anggota yang lain,&nbsp;</small>
                                            <small>dan tekan butang&nbsp;&nbsp;<span class="badge badge-danger"><i
                                                        class="fas fa-minus"></i></span>&nbsp;&nbsp;untuk padam/buang.</small>
                                        </div>
                                    </div>

                                    <hr style="margin: 45px 0 20px 0;">

                                    {{-- MPV ZON “C & D” --}}
                                    <div class="card shadow" style="margin-top: 50px;">
                                        <div class="card-header" style="font-size: 17px; font-weight: bold;">MPV ZON “C & D”
                                        </div>

                                        <div class="card-body">
                                            <u>
                                                <h5>0800HRS -1600HRS</h5>
                                            </u>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="ronda_CD0816_Co">Co-Pilot (C)</label>
                                                    <select id="ronda_CD0816_Co" name="ronda_CD0816_Co1" class="js-select-single form-control" style="width: 100%;">
                                                        <option value=""></option>
                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="ronda_CD0816_Pi">Pilot (P)</label>
                                                    <select id="ronda_CD0816_Pi" name="ronda_CD0816_Pi1" class="js-select-single form-control" style="width: 100%;">
                                                        <option value=""></option>
                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
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
                                                            <button class="btn btn-sm btn-success buttonAdd " id="Addronda_CD0816" data-group="CD0816"
                                                                value="2" type="button"><i
                                                                    class="fas fa-plus mt-2"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="tambahronda_CD0816"></div>
                                        </div>

                                        <div class="card-body">
                                            <u>
                                                <h5>1600HRS– 0000HRS</h5>
                                            </u>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="ronda_CD1600_Co">Co-Pilot (C)</label>
                                                    <select id="ronda_CD1600_Co" name="ronda_CD1600_Co1" class="js-select-single form-control" style="width: 100%;">
                                                        <option value=""></option>
                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="ronda_CD1600_Pi">Pilot (P)</label>
                                                    <select id="ronda_CD1600_Pi" name="ronda_CD1600_Pi1" class="js-select-single form-control" style="width: 100%;">
                                                        <option value=""></option>
                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
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
                                                            <button class="btn btn-sm btn-success buttonAdd " id="Addronda_CD1600" data-group="CD1600"
                                                                value="2" type="button"><i
                                                                    class="fas fa-plus mt-2"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="tambahronda_CD1600"></div>
                                        </div>

                                        <div class="card-body">
                                            <u>
                                                <h5>0001HRS – 0800HRS</h5>
                                            </u>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="ronda_CD0008_Co">Co-Pilot (C)</label>
                                                    <select id="ronda_CD0008_Co" name="ronda_CD0008_Co1" class="js-select-single form-control" style="width: 100%;">
                                                        <option value=""></option>
                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="ronda_CD0008_Pi">Pilot (P)</label>
                                                    <select id="ronda_CD0008_Pi" name="ronda_CD0008_Pi1" class="js-select-single form-control" style="width: 100%;">
                                                        <option value=""></option>
                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
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
                                                            <button class="btn btn-sm btn-success buttonAdd " id="Addronda_CD0008" data-group="CD0008"
                                                                value="2" type="button"><i
                                                                    class="fas fa-plus mt-2"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="tambahronda_CD0008"></div>
                                        </div>

                                        <div class="card-footer">
                                            <small><span style="color: red; font-weight: bold;">**&nbsp;&nbsp;</span>Sila tekan
                                                butang&nbsp;&nbsp;<span class="badge badge-success"><i
                                                        class="fas fa-plus"></i></span>&nbsp;&nbsp;untuk mengisi/menambah
                                                anggota peronda
                                                anggota yang lain,&nbsp;</small>
                                            <small>dan tekan butang&nbsp;&nbsp;<span class="badge badge-danger"><i
                                                        class="fas fa-minus"></i></span>&nbsp;&nbsp;untuk padam/buang.</small>
                                        </div>
                                    </div>

                                    <hr style="margin: 45px 0 20px 0;">

                                    {{-- MPV ZON “E & F” --}}
                                    <div class="card shadow" style="margin-top: 50px;">
                                        <div class="card-header" style="font-size: 17px; font-weight: bold;">MPV ZON “E & F”
                                        </div>

                                        <div class="card-body">
                                            <u>
                                                <h5>0800HRS -1600HRS</h5>
                                            </u>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="ronda_EF0816_Co">Co-Pilot (C)</label>
                                                    <select id="ronda_EF0816_Co" name="ronda_EF0816_Co1" class="js-select-single form-control" style="width: 100%;">
                                                        <option value=""></option>
                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="ronda_EF0816_Pi">Pilot (P)</label>
                                                    <select id="ronda_EF0816_Pi" name="ronda_EF0816_Pi1" class="js-select-single form-control" style="width: 100%;">
                                                        <option value=""></option>
                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
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
                                                            <button class="btn btn-sm btn-success buttonAdd " id="Addronda_EF0816" data-group="EF0816"
                                                                value="2" type="button"><i
                                                                    class="fas fa-plus mt-2"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="tambahronda_EF0816"></div>
                                        </div>

                                        <div class="card-body">
                                            <u>
                                                <h5>1600HRS– 0000HRS</h5>
                                            </u>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="ronda_EF1600_Co">Co-Pilot (C)</label>
                                                    <select id="ronda_EF1600_Co" name="ronda_EF1600_Co1" class="js-select-single form-control" style="width: 100%;">
                                                        <option value=""></option>
                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="ronda_EF1600_Pi">Pilot (P)</label>
                                                    <select id="ronda_EF1600_Pi" name="ronda_EF1600_Pi1" class="js-select-single form-control" style="width: 100%;">
                                                        <option value=""></option>
                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
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
                                                            <button class="btn btn-sm btn-success buttonAdd " id="Addronda_EF1600" data-group="EF1600"
                                                                value="2" type="button"><i
                                                                    class="fas fa-plus mt-2"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="tambahronda_EF1600"></div>
                                        </div>

                                        <div class="card-body">
                                            <u>
                                                <h5>0001HRS – 0800HRS</h5>
                                            </u>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="ronda_EF0008_Co">Co-Pilot (C)</label>
                                                    <select id="ronda_EF0008_Co" name="ronda_EF0008_Co1" class="js-select-single form-control" style="width: 100%;">
                                                        <option value=""></option>
                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="ronda_EF0008_Pi">Pilot (P)</label>
                                                    <select id="ronda_EF0008_Pi" name="ronda_EF0008_Pi1" class="js-select-single form-control" style="width: 100%;">
                                                        <option value=""></option>
                                                        @foreach (App\Models\Officer::get() as $officer)
                                                            <option value="{{ $officer->id }}"> {{ $officer->batch_num }} |
                                                                {{ $officer->name }}</option>
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
                                                            <button class="btn btn-sm btn-success buttonAdd " id="Addronda_EF0008" data-group="EF0008"
                                                                value="2" type="button"><i
                                                                    class="fas fa-plus mt-2"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="tambahronda_EF0008"></div>
                                        </div>

                                        <div class="card-footer">
                                            <small><span style="color: red; font-weight: bold;">**&nbsp;&nbsp;</span>Sila tekan
                                                butang&nbsp;&nbsp;<span class="badge badge-success"><i
                                                        class="fas fa-plus"></i></span>&nbsp;&nbsp;untuk mengisi/menambah
                                                anggota peronda
                                                anggota yang lain,&nbsp;</small>
                                            <small>dan tekan butang&nbsp;&nbsp;<span class="badge badge-danger"><i
                                                        class="fas fa-minus"></i></span>&nbsp;&nbsp;untuk padam/buang.</small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- Ronda Shift Zone --}}

                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="#" class="btn btn-secondary my-3 mr-2" role="button"><i class="fas fa-angle-left"></i>&nbsp;&nbsp;Kembali</a>
                        <div class="justify-content-end">
                            <button class="btn btn-primary my-3 mr-2"><i class="fas fa-save"></i>&nbsp;&nbsp;Simpan</button>
                            <a class="btn btn-info my-3 mr-2"><i class="fas fa-save"></i>&nbsp;&nbsp;Jana</a>
                            <button type="submit" form="CreateRosterForm" class="btn btn-success my-3"><i class="fas fa-paper-plane"></i>&nbsp;&nbsp;Hantar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
