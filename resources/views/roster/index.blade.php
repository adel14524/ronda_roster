@extends('admin.admin_master')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row m-2 justify-content-center">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            Senarai Jadual
                            <div style="float: right">
                                <a class="btn btn-primary float-right" href="{{ route('rosters.create') }}"><i class="fas fa-plus-circle"></i>&ensp;Tambah Jadual</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush datatable" id="RostersTables">
                                    <thead>
                                        <tr>
                                            <th width=5% style="text-center">#</th>
                                            <th width=40% style="text-center">Tajuk</th>
                                            <th width=25% style="text-left">Tarikh Jadual</th>
                                            <th width=30% style="text-center">Sunting</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <form action="{{ route('rosters.store') }}" method="POST" id="DeleteRosters" enctype="multipart/form-data">
                @method('Delete')
                @csrf
            </form>
        </div>
    </div>
@endsection
