<head>
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}
    <style>
        .row{
            display: flex;
            grid-template-columns: repeat(3, auto);
            padding: 0 40px;
            gap: 0px;
            align-items: center;
        }
        .dataTables_length > label{
            width: 99%;
            display: contents;
            grid-template-columns: repeat(3, auto);
            padding: 25px 50px;
            gap: 0px;
            align-items: center;
        }
        .dataTables_filter > label{
            width: 99%;
            display: contents;
            grid-template-columns: repeat(2, auto);
            padding: 25px 50px;
            gap: 0px;
            align-items: center;
        }
        .dataTables_paginate {
            width: 99%;
            margin-top: 1px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1px;
        }
        .dataTables_paginate span{
            width: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<div class="row align-items-center justify-content-xl-between">
    <div class="col-xl-6">
        <div class="copyright text-center text-xl-left text-muted">
            <b>
                Copyright <a href="https://www.iqneting.com.mx" class="font-weight-bold ml-1 text-black" target="_blank">Iqneting</a> &copy; {{ now()->year }} 
            </b>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
{{-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> --}}
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyC2KgaHNJN2fgCYwEUrtTgQMC7hjWrC-8Y"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        "use strict"; // Start of use strict

        $('#tablelist').DataTable({
            retrieve: true,
            dom: "<'row'<'col-xs-5'l><'col-sm-5 text-center'B><'col-lg-5'f>>tp",
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            pageLength : 10,
            "lengthMenu": [[5, 10, 15, 25, 50, -1], [5, 10, 15, 25, 50, "Todos"]],
        });

        $('#tablelistTenantsPayments').DataTable({
            retrieve: true,
            searching: false,
            dom: "<'row'<'col-xs-5'l><'col-sm-5 text-center'B><'col-lg-5'f>>tp",
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            pageLength : 10,
            "lengthMenu": [[5, 10, 15, 25, 50, -1], [5, 10, 15, 25, 50, "Todos"]],
        });

    });
</script>

