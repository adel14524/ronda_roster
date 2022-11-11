$(document).ready(function(){
    if ($('#CarsTable').length > 0) {
        var CarsTable = $('#CarsTable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                "url": "cars/ajax",
                "type": "POST",
                "data": function (d) {
                    d._token = $('meta[name="csrf-token"]').attr('content');
                },
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    className: "text-center",
                },
                {
                    data: 'no_plate',
                    name: 'no_plate',
                },
                {
                    data: 'code',
                    name: 'code',
                },
                {
                    data: 'id',
                    name: 'id',
                    orderable: false,
                    className: "text-center",
                    render: function (data, type, row) {
                        if (data != null) {
                            let del = '<button data-id="' + data + '" class="btn btn-sm d-sm-inline-block btn-danger CarsDelete"><i class="fas fa-trash"></i></button>';
                            let edit = '<button data-id="' + data + '" class="btn btn-sm d-sm-inline-block btn-primary CarsEdit"><i class="fas fa-edit"></i></button>';
                            return type === 'display' ?
                                edit+'&nbsp;'+del : null;
                        } else {
                            return '';
                        }
                    },
                },
            ],
            pageLength: 10,
            language: {
                zeroRecords: "Tiada rekod untuk dipaparkan.",
                paginate: {
                    next: "<i class='fas fa-chevron-right'></i>",
                    previous: "<i class='fas fa-chevron-left'></i>",
                    first: "<<",
                    last: ">>",
                },
                info: "Paparan _START_ / _END_ dari _TOTAL_ rekod",
                infoEmpty: "Paparan 0 / 0 dari 0 rekod",
                infoFiltered: "(tapisan dari _MAX_ rekod)",
                processing: "Sila tunggu...",
                search: "Carian:",
                emptyTable: "Tiada rekod untuk dipaparkan",
                lengthMenu: "Papar _MENU_ Item",
            }
        });
    }

    $(document).on('click', '.CarsEdit', function () {
        console.log('hello');
        let id = $(this).data("id");
        $.ajax({
            type: 'POST',
            url: '/cars/edit',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id,
            },
            success: function (result) {
                console.log(result);
                if (result) {
                    $('#EditCars').attr('action', '/cars/' + result.id + '/update');
                    $('#EditCarNoPlate').val(result.no_plate);
                    $('#EditCarCode').val(result.code);
                    $('#EditCar').modal('toggle');
                }
            },
        });
    });
    
    $(document).on('click', '.CarsDelete', function () {
        let id = $(this).data('id');
        Swal.fire({
            title: 'Adakah anda pasti ?',
            text: "Proses ini tidak boleh diundur!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, padam!',
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                $('#DeleteCar').attr('action', '/cars/' + id);
                $('#DeleteCar').submit();
            }
        })
    });
});