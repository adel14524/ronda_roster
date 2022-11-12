$(document).ready(function () {

    $('.select2-single').select2();

    if ($('#RostersTables').length > 0) {
        var RostersTable = $('#RostersTables').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                "url": "/rosters/ajax",
                "type": "POST",
                "data": function (d) {
                    d._token = $('meta[name="csrf-token"]').attr('content');
                },
            },
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    className: "text-center",
                },
                {
                    data: 'pindaan',
                    name: 'pindaan',
                },
                {
                    data: 'tarikh',
                    name: 'tarikh',
                },
                {
                    data: 'status',
                    name: 'status',
                    render: function (data, type, row) {

                                //status draf    // <span class="badge badge-pill badge-info">Info</span>
                                let html = '<span class="badge badge-pill badge-success">Telah Disahkan</span>'
                                return html;
                            }
                },
                // {
                //     data: 'role_batch',
                //     name: 'role_batch',
                //     render: function (data, type, row) {
                //         let roles = [];

                //         return roles[data];
                //     }
                // },
                {
                    data: 'id',
                    name: 'id',
                    orderable: false,
                    className: "text-center",
                    render: function (data, type, row) {
                        if (data != null) {
                            let del = '<button data-id="' + data + '" class="btn btn-sm d-sm-inline-block btn-danger OfficersDeletea"><i class="fas fa-trash"></i></button>';
                            let view = '<a data-id="' + data + '" class="btn btn-sm d-sm-inline-block btn-info RosterPreview" href="/rosters/' + data + '/preview" ><i class="fas fa-print"></i></a>';
                            let edit = '<button data-id="' + data + '" class="btn btn-sm d-sm-inline-block btn-primary OfficersEdita"><i class="fas fa-edit"></i></button>';
                            return type === 'display' ?
                                view+'&nbsp;'+edit+'&nbsp;'+del : null;
                        } else {
                            return '';
                        }
                    },
                },
            ],
            pageLength: 25,
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
                lengthMenu: "Papar _MENU_ item",
            }
        });
    }

    $(document).on('click', '.RosterPreview', function (){
        // console.log("fjksbvhef");
    })

    $(document).on('click', '.RostersEdit', function () {
        window.location.href = '/officers/' + $(this).data('id') + '/edit';
    });

    $(document).on('click', '.RostersDelete', function () {
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
                $('#RostersDeleteID').val(id);
                $('#RostersDeleteForm').submit();
            }
        })
    });

    $('.js-select-single').select2({
        placeholder: "Sila pilih",
        // width: 'resolve', // need to override the changed default
        minimumInputLength:0,
        allowClear: true,
    });

    $('.js-select-mult').select2({
        placeholder: "Boleh pilih lebih dari satu",
        minimumInputLength:0,
        allowClear: true,
        multiple:true
    });

    function renderSelect2(){

        $('.js-select-single').select2({
            placeholder: "Sila pilih",
            // width: 'resolve', // need to override the changed default
            minimumInputLength:0,
            allowClear: true,
        });

        $('.js-select-mult').select2({
            placeholder: "Boleh pilih lebih dari satu",
            minimumInputLength:0,
            allowClear: true,
            multiple:true
        });
    }

    var fade = function (){
        if (!$("#fadeOutdiv").hasClass('skipped')) {
            $("#fadeOutdiv").fadeIn(700);
        }
    };

    $(".buttonAdd").click(function(){
        $("#fadeOutdiv").fadeIn(700).addClass('skipped');
        fade();
    });

    setTimeout(fade,5000);

    // $(".buttonRemove").click(function(){
    //     $("#fadeOutdiv").fadeOut(0001);
    // });

    function listOfficer(){

        // console.log($('meta[name="csrf-token"]').attr('content'));
        $.ajax({
            type: 'POST',
            url : '/officers/ajax',
            data:   {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        optionOfficer : true,
                    },
            success: function (results) {
                console.log(results)
                console.log(results.length)
                // reJSON.parse(results);
                if (results.length > 0) {

                    let option = ''


                    results.forEach(elem => {
                        option += '<option value="'+elem.id+'">'+elem.batch_num+' | '+elem.name+'</option>'
                    });
                    // console.log(option)
                    return option;

                }else{
                    Swal.fire(
                        'Error!',
                        results.message,
                        'error'
                    )
                }
            },
        })
    }


    // cuti
    $(document).on('click', '#AddCuti', function(){

        $.ajax({
            type: 'POST',
            url : '/officers/ajax',
            data:   {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        optionOfficer : true,
                    },
            success: function (results) {
                if (results.length > 0) {

                    let option = ''

                    results.forEach(elem => {
                        option += '<option value="'+elem.id+'">'+elem.batch_num+' | '+elem.name+'</option>'
                    });

                    let count = $('#countCuti').val()
                    let cuti = $('#AddCuti').val()

                    let html = '<div class="row mt-4 removeclassCuti'+cuti+'" >'+
                                    '<div class="form-group col-md-4">' +
                                        '<label for="anggotaCuti'+ cuti +'">Anggota</label>' +
                                        '<select id="anggotaCuti'+ cuti +'" name="anggotaCuti'+ cuti +'" class="js-select-single form-control">' +
                                            '<option value="" selected>Sila Pilih </option>' +
                                            option +
                                        '</select>'+
                                    '</div>' +
                                    '<div class="form-group col-md-4">'+
                                        '<label for="startDate'+ cuti +'">Tarikh Mula Cuti</label>'+
                                        '<input type="date" class="form-control" id="startDateCuti'+ cuti +'" name="startDateCuti'+ cuti +'" placeholder="Masukkan tarikh mula cuti"/>'+
                                    '</div>'+
                                    '<div class="form-group col-md-4">'+
                                        '<label for="endDate'+ cuti +'">Tarikh Tamat Cuti</label>'+
                                        '<div class="input-group">'+
                                            '<input type="date" class="form-control" id="endDateCuti'+ cuti +'" name="endDateCuti'+ cuti +'" placeholder="Masukkan tarikh tamat cuti">'+
                                            '<div class="input-group-btn">'+
                                                '<button class="btn btn-danger buttonRemove BuangCuti" type="button" value="'+ cuti +'" ><i class="fas fa-minus mt-2"></i></button>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="clear"></div>';

                    $('#AddCuti').val(++cuti)
                    $('.tambahCuti').append(html);
                    $('#countCuti').val(++count)
                    renderSelect2()

                }else{
                    Swal.fire(
                        'Error!',
                        results.message,
                        'error'
                    )
                }

            },
        })

    })

    $(document).on('click','.BuangCuti', function(){
        let rid = $(this).val()
        $('.removeclassCuti'+rid).remove();
        let count = $('#countCuti').val()
        $('#countCuti').val(--count)
    })
    // cuti

    // cuti sakit
    var cutiSakit = 1;
    $(document).on('click', '#AddSakit', function(){

        $.ajax({
            type: 'POST',
            url : '/officers/ajax',
            data:   {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        optionOfficer : true,
                    },
            success: function (results) {
                if (results.length > 0) {

                    let option = ''

                    results.forEach(elem => {
                        option += '<option value="'+elem.id+'">'+elem.batch_num+' | '+elem.name+'</option>'
                    });

                    let count = $('#countCutiSakit').val()
                    let cutiSakit = $('#AddSakit').val()
                    let html = '<div class="row mt-4 removeclassSakit'+cutiSakit+'" id="fadeOutdiv">'+
                                    '<div class="form-group col-md-4">' +
                                        '<label for="anggotaCutiSakit'+ cutiSakit +'">Anggota</label>' +
                                        '<select id="anggotaCutiSakit'+ cutiSakit +'" name="anggotaCutiSakit'+ cutiSakit +'" class="js-select-single form-control">' +
                                            '<option></option>' +
                                            option+
                                        '</select>'+
                                    '</div>' +
                                    '<div class="form-group col-md-4">'+
                                        '<label for="startDate'+ cutiSakit +'">Tarikh Mula Cuti</label>'+
                                        '<input type="date" class="form-control" id="startDateSakit'+ cutiSakit +'" name="startDateSakit'+ cutiSakit +'" placeholder="Masukkan tarikh mula cutiSakit"/>'+
                                    '</div>'+
                                    '<div class="form-group col-md-4">'+
                                        '<label for="endDateSakit'+ cutiSakit +'">Tarikh Tamat Cuti</label>'+
                                        '<div class="input-group">'+
                                            '<input type="date" class="form-control" id="endDateSakit'+ cutiSakit +'" name="endDateSakit'+ cutiSakit +'" placeholder="Masukkan tarikh tamat cutiSakit">'+
                                            '<div class="input-group-btn">'+
                                                // '<a class="btn btn-danger buttonRemove remove_education_fields" href="#" role="button" onclick="remove_education_fields('+ cutiSakit +');"><i class="fas fa-minus mt-2"></i></a>'+
                                                '<button class="btn btn-danger buttonRemove BuangSakit" type="button" value="'+ cutiSakit +'" data-remove="'+ cutiSakit +'" ><i class="fas fa-minus mt-2"></i></button>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="clear"></div>';

                    $('#AddSakit').val(++cutiSakit)
                    $('#tambahSakit').append(html)
                    $('#countCutiSakit').val(++count)
                    renderSelect2()

                }else{
                    Swal.fire(
                        'Error!',
                        results.message,
                        'error'
                    )
                }

            },
        })

    })

    $(document).on('click','.BuangSakit', function(){
        var rid = $(this).val()
        $('.removeclassSakit'+rid).remove();
        let count = $('#countCutiSakit').val()
        $('#countCutiSakit').val(--count)
    })
    // cuti sakit


    // penugasan
    var tugas = 1;
    $(document).on('click', '#AddTugas', function(){

        $.ajax({
            type: 'POST',
            url : '/officers/ajax',
            data:   {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        optionOfficer : true,
                    },
            success: function (results) {
                if (results.length > 0) {

                    let option = ''

                    results.forEach(elem => {
                        option += '<option value="'+elem.id+'">'+elem.batch_num+' | '+elem.name+'</option>'
                    });

                    let count = $('#countTugas').val();
                    let tugas = $('#AddTugas').val()
                    let html = '<div class="row mt-4 removeclassTugas'+tugas+'" id="fadeOutdiv">'+
                                '    <div class="form-group col-md-7 col-sm-6">'+
                                        '<label for="startDate">Lawatan Lokasi Sasaran Penting</label>'+
                                '        <input type="text" class="form-control penugasan" id="penugasan" name="penugasan'+ tugas +'" placeholder="Masukkan Jenis Penugasan" />'+
                                '    </div>'+
                                '    <div class="form-group col-md-5 col-sm-6">'+
                                        '<label for="inputEmail4">Tindakan Penyelia Syif</label>'+
                                        '<div class="input-group">'+
                                            '<select class="js-select-mult form-control" data-placeholder="Sila Pilih"'+ 'data-allow-clear="true" multiple="multiple" name="pegawaiPenugasan'+ tugas +'[]"  style="width: 90%;">'+
                                                option +
                                            '</select>'+
                                            '<div class="input-group-btn">'+
                                                '<button class="btn btn-sm btn-danger BuangTugas" type="button" value="'+ tugas +'" ><i class="fas fa-minus mt-2"></i></button>'+
                                            '</div>'+
                                '        </div>'+
                                '    </div>'+
                                '</div>'

                    $('#AddTugas').val(++tugas)
                    $('#countTugas').val(++count)
                    $('#tambahTugas').append(html)
                    renderSelect2()

                }else{
                    Swal.fire(
                        'Error!',
                        results.message,
                        'error'
                    )
                }

            },
        })


    })
    $(document).on('click','.BuangTugas', function(){
        var rid = $(this).val()
        $('.removeclassTugas'+rid).remove();
        var count = $('#countTugas').val()
        $('#countTugas').val(--count)
    })
    // penugasan

    let divCode = [
        "AB0816","AB1600","AB0008",
        "CD0816","CD1600","CD0008",
        "EF0816","EF1600","EF0008",
    ]

    // divCode.forEach(element => {

        $(document).on('click', '#Addronda_AB0816 ,#Addronda_AB1600 ,#Addronda_AB0008 , #Addronda_CD0816 ,#Addronda_CD1600 ,#Addronda_CD0008 , #Addronda_EF0816 ,#Addronda_EF1600 ,#Addronda_EF0008 ' , function(){

            if($(this).val() < 3){
                let group_id = $(this).data('group');
                console.log(group_id)
                let count = $(this).val()
                let optionOfficer = listOfficer()

                $.ajax({
                    type: 'POST',
                    url : '/officers/ajax',
                    data:   {
                                _token: $('meta[name="csrf-token"]').attr('content'),
                                optionOfficer : true,
                            },
                    success: function (results) {

                        if (results.length > 0) {

                            let option = ''

                            results.forEach(elem => {
                                option += '<option value="'+elem.id+'">'+elem.batch_num+' | '+elem.name+'</option>'
                            });

                            $.ajax({
                                type: 'POST',
                                url : '/cars/ajax',
                                data:   {
                                            _token: $('meta[name="csrf-token"]').attr('content'),
                                            optionCar : true,
                                        },
                                success: function (results) {

                                    if (results.length > 0) {

                                        let optionCar = ''

                                        results.forEach(elem => {
                                            optionCar += '<option value="'+elem.id+'">('+elem.code+') '+elem.no_plate+'</option>'
                                        });

                                        let html =
                                        '<div class="row mt-4 removeclassronda_' + group_id + count +'">'+
                                            '<div class="form-group col-md-4">'+
                                                '<label for="ronda_'+ group_id +'_Co_Name'+count+'">Co-Pilot (C)</label>'+
                                                '<select id="ronda_'+ group_id +'_Co_Name'+count+'" name="ronda_'+ group_id +'_Co'+count+'" class="js-select-single form-control" style="width: 100%;">'+
                                                    '<option></option>'+
                                                    option+
                                                '</select>'+
                                            '</div>'+
                                            '<div class="form-group col-md-4">'+
                                                '<label for="ronda_'+ group_id +'_Pi_Name'+count+'">Pilot (P)</label>'+
                                                '<select id="ronda_'+ group_id +'_Pi_Name'+count+'" name="ronda_'+ group_id +'_Pi'+count+'" class="js-select-single form-control" style="width: 100%;">'+
                                                    '<option></option>'+
                                                    option+
                                                '</select>'+
                                            '</div>'+
                                            '<div class="form-group col-md-4">'+
                                                '<label for="ronda_'+ group_id +'_Kereta'+count+'">Kereta</label>'+
                                                '<div class="input-group">'+
                                                    '<select id="ronda_'+ group_id +'_Kereta'+count+'" name="ronda_'+ group_id +'_Kereta'+count+'" class="js-select-single form-control" style="width: 90%;">'+
                                                        '<option></option>'+
                                                        optionCar+
                                                    '</select>'+
                                                    '<div class="input-group-btn">'+
                                                        '<button class="btn btn-sm btn-danger Buangronda_'+ group_id +'" type="button" value="'+ count +'" data-group="'+group_id+'" ><i class="fas fa-minus mt-2"></i></button>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'


                                    $('#Addronda_' + group_id).val(++count)
                                    $('#tambahronda_' + group_id).append(html)
                                    renderSelect2()

                                    }else{
                                        Swal.fire(
                                            'Error!',
                                            results.message,
                                            'error'
                                        )
                                    }

                                },
                            })

                        }else{
                            Swal.fire(
                                'Error!',
                                results.message,
                                'error'
                            )
                        }

                    },
                })

            } else{

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'info',
                    title: 'Sudah mencapai had bilangan peronda'
                })

            }

        })

        $(document).on('click',' .Buangronda_AB0816 , .Buangronda_AB1600 , .Buangronda_AB0008 ,  .Buangronda_CD0816 , .Buangronda_CD1600 , .Buangronda_CD0008 ,  .Buangronda_EF0816 , .Buangronda_EF1600 , .Buangronda_EF0008 ', function(){
            var rid = $(this).val()
            let group_id = $(this).data('group');
            $('#Addronda_'+group_id).val(2)
            $('.removeclassronda_'+group_id+rid).remove();
        })

    // });

        function getOfficerList(){
            $.ajax({
                type: 'POST',
                url : '/officers/ajax',
                data:   {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            optionOfficer : true,
                        },
                success: function (results) {
                    if (results.length > 0) {

                        let option = ''

                        results.forEach(elem => {
                            option += '<option value="'+elem.id+'">'+elem.batch_num+' | '+elem.name+'</option>'
                        });

                    }else{
                        Swal.fire(
                            'Error!',
                            results.message,
                            'error'
                        )
                    }

                },
            })
        }

    if ($('#rosterWizard')) {

        //Enable Tooltips
        var tooltipTriggerList = [].slice.call(
            document.querySelectorAll('[data-bs-toggle="tooltip"]')
        );
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        //Advance Tabs
        $(".next").click(function () {
            const nextTabLinkEl = $(".nav-tabs .active")
                .closest("li")
                .next("li")
                .find("a")[0];
            const nextTab = new bootstrap.Tab(nextTabLinkEl);
            nextTab.show();
        });

        $(".previous").click(function () {
            const prevTabLinkEl = $(".nav-tabs .active")
                .closest("li")
                .prev("li")
                .find("a")[0];
            const prevTab = new bootstrap.Tab(prevTabLinkEl);
            prevTab.show();
        });

        // $(document).ready(function () {
        // });
    }
});
