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

            var table = $('#myTable', function() {
                $('.dt-buttons .btn').removeClass('btn-secondary').addClass('btn-sm btn-secondary');
            }).DataTable({
                dom: 'Bfrtip',
                lengthChange: true,
                buttons: [{
                        extend: 'pdfHtml5',
                        orientation: 'potrait',
                        pageSize: 'LEGAL',
                        download: 'open',
                        exportOptions: {
                            columns: ':visible',
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible',
                        }
                    },
                    {
                        extend: 'csvHtml5',
                        exportOptions: {
                            columns: ':visible',
                        }
                    },
                    'copy'
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
        });
    </script>
    {{-- <script type="text/javascript">
        $(document).ready(function() {

            // Create date inputs
            minDate = new DateTime($('#min'), {
                format: 'MMMM Do YYYY'
            });
            maxDate = new DateTime($('#max'), {
                format: 'MMMM Do YYYY'
            });

            $('#myTable thead tr')
                .clone(true)
                .addClass('filters')
                .appendTo('#myTable thead');

            var table = $('#myTable', function() {
                $('.dt-buttons .btn').removeClass('btn-secondary').addClass('btn-sm btn-secondary');
            }).DataTable({
                lengthChange: true,
                buttons: [{
                        extend: 'pdfHtml5',
                        orientation: 'potrait',
                        pageSize: 'LEGAL',
                        download: 'open',
                        exportOptions: {
                            columns: ':visible',
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible',
                        }
                    },
                    {
                        extend: 'csvHtml5',
                        exportOptions: {
                            columns: ':visible',
                        }
                    },
                    'copy', 'colvis'
                ],
                language: {
                    paginate: {
                        previous: "<i class='fas fa-angle-left'>",
                        next: "<i class='fas fa-angle-right'>"
                    }
                },
                orderCellsTop: true,
                fixedHeader: true,
                initComplete: function() {
                    var api = this.api();

                    // For each column
                    api
                        .columns()
                        .eq(0)
                        .each(function(colIdx) {
                            // Set the header cell to contain the input element
                            var cell = $('.filters th').eq(
                                $(api.column(colIdx).header()).index()
                            );
                            var title = $(cell).text();
                            $(cell).html(
                                '<input type="text" class="form-control form-control-sm" placeholder="' +
                                title + '" />');

                            // On every keypress in this input
                            $(
                                    'input',
                                    $('.filters th').eq($(api.column(colIdx).header()).index())
                                )
                                .off('keyup change')
                                .on('keyup change', function(e) {
                                    e.stopPropagation();

                                    // Get the search value
                                    $(this).attr('title', $(this).val());
                                    var regexr =
                                        '({search})'; //$(this).parents('th').find('select').val();

                                    var cursorPosition = this.selectionStart;
                                    // Search the column for that value
                                    api
                                        .column(colIdx)
                                        .search(
                                            this.value != '' ?
                                            regexr.replace('{search}', '(((' + this.value +
                                                ')))') :
                                            '',
                                            this.value != '',
                                            this.value == ''
                                        )
                                        .draw();

                                    $(this)
                                        .focus()[0]
                                        .setSelectionRange(cursorPosition, cursorPosition);
                                });
                        });
                },
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
    </script> --}}
    <script type="text/javascript">
        $("input[data-type='currency']").on({
            keyup: function() {
                formatCurrency($(this));
            },
            blur: function() {
                formatCurrency($(this), "blur");
            }
        });


        function formatNumber(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        }


        function formatCurrency(input, blur) {
            // appends $ to value, validates decimal side
            // and puts cursor back in right position.

            // get input value
            var input_val = input.val();

            // don't validate empty input
            if (input_val === "") {
                return;
            }

            // original length
            var original_len = input_val.length;

            // initial caret position 
            var caret_pos = input.prop("selectionStart");

            // check for decimal
            if (input_val.indexOf(".") >= 0) {

                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(".");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = formatNumber(left_side);

                // validate right side
                right_side = formatNumber(right_side);

                // On blur make sure 2 numbers after decimal
                if (blur === "blur") {
                    right_side += "00";
                }

                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 2);

                // join number by .
                input_val = "Rp" + left_side + "." + right_side;

            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = formatNumber(input_val);
                input_val = "Rp" + input_val;

                // final formatting
                if (blur === "blur") {
                    input_val += ".00";
                }
            }

            // send updated string to input
            input.val(input_val);

            // put caret back in the right position
            var updated_len = input_val.length;
            caret_pos = updated_len - original_len + caret_pos;
            input[0].setSelectionRange(caret_pos, caret_pos);
        }
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
    </script>
</body>

</html>
