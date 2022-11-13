@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row m-2 justify-content-center">
                <div class="col-12">
                    <div class="card shadow ">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    Pralihat Jadual
                                </div>
                                <div class="col  d-flex justify-content-end">
                                        <a class="btn btn-sm btn-primary float-right" href="{{ route('rosters.home') }}"><i class="fas fa-arrow-left"></i>&ensp;Kembali</a>
                                        <button type="button" class="btn btn-sm btn-light bg-primary btn-icon mr-3 d-none d-md-block js-print-question float-right"
                                        onclick="document.getElementById('print').contentWindow.print();"><span style="color:white">Cetak</span> &nbsp;<i class="fas fa-print text-light"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body align-content-center">
                            <iframe id="print" src="{{ route('rosters.iframe', ['id' => $id]) }}"  title="APMenengah"
                                style="width:100%; min-height: 1200px; border: 1px solid #ddd;background-color:#fff;"></iframe>

                            {{-- <div style="width: 100%">
                                <iframe id="print" src="{{ route('instruments.iframe', ['id' => $id]) }}" title="APMenengah"
                                    style="width:100%; min-height: 1200px; border: 1px solid #ddd;background-color:#fff;">
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
