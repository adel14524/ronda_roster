@extends('admin.admin_master')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row m-2 justify-content-center">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            {{ __('Senarai Kereta') }}
                            <div style="float: right">
                                <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#CreateCar"><i class="fas fa-plus-circle"></i>&ensp;Tambah Kereta</button>
                            </div>

                        </div>

                        <div class="card-body">
                            {{-- @if (Session::has('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ Session::get('message') }}</strong>
                                    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">×</span></button>
                                </div>
                            @endif
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ $error }}</strong>
                                        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">×</span></button>
                                    </div>
                                @endforeach
                            @endif --}}
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush datatable" id="CarsTable">
                                    <thead>
                                        <tr>
                                            <th style="text-center">#</th>
                                            <th style="text-left">No Plate</th>
                                            <th style="text-center">Kod Kereta</th>
                                            <th style="text-center">Sunting</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            {{-- Create Modal --}}
            <div class="modal fade" id="CreateCar" tabindex="-1" role="dialog" aria-labelledby="CarSettingTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Kereta</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="{{ route('cars.store') }}" method="POST" id="CreateCars" enctype="multipart/form-data">
                            @csrf

                            <div class="modal-body">
                                <div class="form-group pb-2">
                                    <label for="noPlate">No Plate</label>
                                    <input type="text" name="no_plate" class="form-control" placeholder="cth: WTH34562" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="kodKereta">Kod Kereta</label>
                                    <input type="text" name="code" class="form-control" placeholder="cth: KD41" required>
                                </div>  
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-ban"></i>&ensp;Batal</button>
                                <button type="submit" form="CreateCars" class="btn btn-success"><i class="fas fa-save"></i>&ensp;Simpan</button>
                            </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <div class="modal fade" id="EditCar" tabindex="-1" role="dialog" aria-labelledby="CarSettingTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Sunting Kereta</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="{{ route('cars.store') }}" method="POST" id="EditCars" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="noPlate">No Plate</label>
                                    <input type="text" name="no_plate" id="EditCarNoPlate" class="form-control" placeholder="cth: WTH34562" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="kodKereta">Kod Kereta</label>
                                    <input type="text" name="code" id="EditCarCode" class="form-control" placeholder="cth: KD41" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-ban"></i>&ensp;Batal</button>
                                <button type="submit" form="EditCars" class="btn btn-success"><i class="fas fa-save"></i>&ensp;Sunting</button>
                            </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <form action="{{ route('cars.store') }}" method="POST" id="DeleteCar" enctype="multipart/form-data">
                @method('Delete')
                @csrf
            </form>
        </div>
    </div>
@endsection