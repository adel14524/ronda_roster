@extends('admin.admin_master')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Upcube</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-4 col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Jumlah Jadual</p>
                                    <h4 class="mb-2">{{ $countRoster }}</h4>
                                    <p class="text-muted mb-0">Kemaskini terakhir pada&nbsp;<span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>{{ $latestRoster }}</span></p>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-primary rounded-3">
                                        <i class="mdi mdi-calendar-text font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-4 col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Jumlah Anggota</p>
                                    <h4 class="mb-2">{{ $countOfficer }}</h4>
                                    <p class="text-muted mb-0">Kemaskini terakhir pada&nbsp;<span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-down-line me-1 align-middle"></i>{{ $latestOfficer }}</span></p>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class="mdi mdi-police-badge font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-4 col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Jumlah Kereta</p>
                                    <h4 class="mb-2">{{ $countCar }}</h4>
                                    <p class="text-muted mb-0">Kemaskini terakhir pada&nbsp;<span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>{{ $latestCar }}</span></p>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-primary rounded-3">
                                        <i class="ri-police-car-fill font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            @php
                                $today = date('d/m/Y');
                                $checkRoster = \App\Models\Roster::select('id','tarikh_mula')->orderBy('tarikh_mula', 'desc')->first();
                                $rosterDate = date('d/m/Y', strtotime($checkRoster->tarikh_mula));
                                $id = $checkRoster->id;
                            @endphp
                            <div class="row d-flex">

                                <div class="col">
                                    <h4 class="card-title mb-4">Jadual Hari Ini ({{ $today }})</h4>
                                </div>
                                <div class="col">
                                    {{-- <a class="btn btn-sm btn-primary float-right" href="{{ route('rosters.home') }}"><i class="fas fa-arrow-left"></i>&ensp;Kembali</a> --}}
                                    <button type="button" class="btn btn-sm btn-light bg-primary btn-icon d-none d-md-block js-print-question float-right" onclick="document.getElementById('print').contentWindow.print();"><span style="color:white">Cetak</span> &nbsp;<i class="fas fa-print text-light"></i></button>
                                </div>
                            </div>

                            @if ($today == $rosterDate)
                                <iframe id="print" src="{{ route('rosters.iframe', ['id' => $id]) }}"  title="APMenengah"
                                    style="width:100%; min-height: 1200px; border: 1px solid #ddd;background-color:#fff;"></iframe>
                            @else
                                <div class="alert alert-danger" role="alert">
                                    Jadual rondaan harini belum dibuat.
                                </div>
                            @endif

                            {{-- <div class="table-responsive"> --}}
                                {{-- <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Status</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th style="width: 120px;">Salary</th>
                                        </tr>
                                    </thead><!-- end thead -->
                                    <tbody>
                                        <tr>
                                            <td><h6 class="mb-0">Charles Casey</h6></td>
                                            <td>Web Developer</td>
                                            <td>
                                                <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                            </td>
                                            <td>
                                                23
                                            </td>
                                            <td>
                                                04 Apr, 2021
                                            </td>
                                            <td>$42,450</td>
                                        </tr>
                                        <!-- end -->
                                        <tr>
                                            <td><h6 class="mb-0">Alex Adams</h6></td>
                                            <td>Python Developer</td>
                                            <td>
                                                <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>Deactive</div>
                                            </td>
                                            <td>
                                                28
                                            </td>
                                            <td>
                                                01 Aug, 2021
                                            </td>
                                            <td>$25,060</td>
                                        </tr>
                                        <!-- end -->
                                        <tr>
                                            <td><h6 class="mb-0">Prezy Kelsey</h6></td>
                                            <td>Senior Javascript Developer</td>
                                            <td>
                                                <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                            </td>
                                            <td>
                                                35
                                            </td>
                                            <td>
                                                15 Jun, 2021
                                            </td>
                                            <td>$59,350</td>
                                        </tr>
                                        <!-- end -->
                                        <tr>
                                            <td><h6 class="mb-0">Ruhi Fancher</h6></td>
                                            <td>React Developer</td>
                                            <td>
                                                <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                            </td>
                                            <td>
                                                25
                                            </td>
                                            <td>
                                                01 March, 2021
                                            </td>
                                            <td>$23,700</td>
                                        </tr>
                                        <!-- end -->
                                        <tr>
                                            <td><h6 class="mb-0">Juliet Pineda</h6></td>
                                            <td>Senior Web Designer</td>
                                            <td>
                                                <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                            </td>
                                            <td>
                                                38
                                            </td>
                                            <td>
                                                01 Jan, 2021
                                            </td>
                                            <td>$69,185</td>
                                        </tr>
                                        <!-- end -->
                                        <tr>
                                            <td><h6 class="mb-0">Den Simpson</h6></td>
                                            <td>Web Designer</td>
                                            <td>
                                                <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>Deactive</div>
                                            </td>
                                            <td>
                                                21
                                            </td>
                                            <td>
                                                01 Sep, 2021
                                            </td>
                                            <td>$37,845</td>
                                        </tr>
                                        <!-- end -->
                                        <tr>
                                            <td><h6 class="mb-0">Mahek Torres</h6></td>
                                            <td>Senior Laravel Developer</td>
                                            <td>
                                                <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                            </td>
                                            <td>
                                                32
                                            </td>
                                            <td>
                                                20 May, 2021
                                            </td>
                                            <td>$55,100</td>
                                        </tr>
                                        <!-- end -->
                                    </tbody><!-- end tbody -->
                                </table> --}}
                                <!-- end table -->
                            {{-- </div> --}}
                        </div><!-- end card -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>

    </div>
@endsection
