<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author">
    <title>DCH AURIGA @yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/brand/favicon.png') }}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Page plugins -->
    <link rel="stylesheet" href="{{ asset('vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/quill/dist/quill.core.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.dateTime.min.css') }}" type="text/css">

    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('css/argon.css?v=1.1.0') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/formwizard/formwizard.css') }}" type="text/css">


    <!-- CSS for filter -->
    <style>
        thead input {
            width: 100%;
        }

        .no-spinner::-webkit-inner-spin-button,
        .no-spinner::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .no-spinner {
            appearance: textfield;
            -moz-appearance: textfield;
            /* Firefox */
        }
    </style>

</head>

<body onload="startTime()">
    @include('sweetalert::alert')
    @include('nav.sidebar')
    <div class="main-content" id="panel">
        @include('nav.topnav')
        @yield('content')
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Optional JS -->
    <script src="{{ asset('vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/dist/Chart.extension.js') }}"></script>
    <script src="{{ asset('vendor/jvectormap-next/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
    <script src="{{ asset('js/vendor/dataTables.dateTime.min.js') }}"></script>
    <script src="{{ asset('js/vendor/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('vendor/nouislider/distribute/nouislider.min.js') }}"></script>
    <script src="{{ asset('vendor/quill/dist/quill.min.js') }}"></script>
    <script src="{{ asset('vendor/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    <script src="{{ asset('js/formwizard/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/formwizard/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('js/formwizard/main.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('js/argon.js?v=1.1.0') }}"></script>
    <!-- Demo JS - remove this in your project -->
    <script src="{{ asset('js/demo.min.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="{{ asset('vendor/DataTables/datatables.min.js') }}"></script>
    @yield('date-filter')
    <script type="text/javascript">
        $(document).ready(function() {
            minDate = new DateTime($('#min'), {
                format: 'MMMM Do YYYY'
            });
            maxDate = new DateTime($('#max'), {
                format: 'MMMM Do YYYY'
            });

            var tableProduct = $('#table-product', function() {
                $('.dt-buttons .btn').removeClass('btn-secondary').addClass('btn-sm btn-secondary');
            }).DataTable({
                dom: 'Bfrtip',
                buttons: [],
                lengthChange: true,
                language: {
                    paginate: {
                        previous: "<i class='fas fa-angle-left'>",
                        next: "<i class='fas fa-angle-right'>"
                    }
                },
                orderCellsTop: true,
                fixedHeader: true,
            });


        });
    </script>

<script type="text/javascript">
    $(document).ready(function() {
        minDate = new DateTime($('#min'), {
            format: 'MMMM Do YYYY'
        });
        maxDate = new DateTime($('#max'), {
            format: 'MMMM Do YYYY'
        });

        var tableBu = $('#table-bu', function() {
                $('.dt-buttons .btn').removeClass('btn-secondary').addClass('btn-sm btn-secondary');
            }).DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                'url': "{{ route('get.datatables.bu') }}",
                'type': 'GET'
            },
            columns: [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'gambar',
                    name: 'gambar'
                },
                {
                    data: 'agency_code',
                    name: 'agency_code'
                },
                {
                    data: 'business_unit',
                    name: 'business_unit'
                },
                {
                    data: 'brand_name',
                    name: 'brand_name'
                },
                {
                    data: 'company',
                    name: 'company'
                },
            ],
            lengthChange: true,
            language: {
                paginate: {
                    previous: "<i class='fas fa-angle-left'>",
                    next: "<i class='fas fa-angle-right'>"
                }
            },
            orderCellsTop: true,
            fixedHeader: true,
        });


    });
</script>
    <script type="text/javascript">
        $(document).ready(function() {

            // Create date inputs
            minDate = new DateTime($('#min'), {
                format: 'MMMM Do YYYY'
            });
            maxDate = new DateTime($('#max'), {
                format: 'MMMM Do YYYY'
            });

            var table = $('#myTable', function() {
                $('.dt-buttons .btn').removeClass('btn-secondary').addClass('btn-sm btn-secondary');
            }).DataTable({
                lengthChange: true,
                buttons: [
                    // {
                    //     extend: 'pdfHtml5',
                    //     title: 'Auriga Purchase Order',
                    //     orientation: 'potrait',
                    //     pageSize: 'LEGAL',
                    //     download: 'open',
                    //     exportOptions: {
                    //         columns: ':visible',
                    //     }
                    // },
                    // {
                    //     extend: 'excelHtml5',
                    //     title: 'Auriga Purchase Order',
                    //     titleAttr: 'Export Excel',
                    //     exportOptions: {
                    //         columns: ':visible',
                    //     }
                    // },
                    // {
                    //     extend: 'csvHtml5',
                    //     exportOptions: {
                    //         columns: ':visible',
                    //     }
                    // },
                    // 'copy',
                    'colvis'
                ],
                language: {
                    paginate: {
                        previous: "<i class='fas fa-angle-left'>",
                        next: "<i class='fas fa-angle-right'>"
                    }
                },
                orderCellsTop: true,
                fixedHeader: true,
            });

            // Refilter the table
            $('#min, #max').on('change', function() {
                table.draw();
            });

            table.buttons().container()
                .appendTo('#myTable_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script type="text/javascript">
        function visibility3() {
            var x = document.getElementById('create_password');
            if (x.type === 'password') {
                x.type = "text";
                $('#eyeShow').show();
                $('#eyeSlash').hide();
            } else {
                x.type = "password";
                $('#eyeShow').hide();
                $('#eyeSlash').show();
            }
        }
    </script>
    <script type="text/javascript">
        function updateTextView(_obj) {
            var num = getNumber(_obj.val());
            if (num == 0) {
                _obj.val('');
            } else {
                _obj.val(num.toLocaleString());
            }
        }

        function getNumber(_str) {
            var arr = _str.split('');
            var out = new Array();
            for (var cnt = 0; cnt < arr.length; cnt++) {
                if (isNaN(arr[cnt]) == false) {
                    out.push(arr[cnt]);
                }
            }
            return Number(out.join(''));
        }
        $(document).ready(function() {
            $('input[type=textnumber]').on('keyup', function() {
                updateTextView($(this));
            });
        });
    </script>
    <script>
        function startTime() {
            const today = new Date();
            let h = today.getHours();
            let m = today.getMinutes();
            let s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('clock').innerHTML = h + ":" + m + ":" + s;
            setTimeout(startTime, 1000);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers < 10
            return i;
        }


        $('.mdl-detail').click(function() {
            // Mendapatkan data ID dari atribut data-id tombol yang diklik
            var id = $(this).data('id');
            $('#idKu').val(id);
        });

        
    </script>
    @yield('custom-script')
</body>

</html>
