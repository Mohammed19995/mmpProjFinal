@extends('admin.app')

@section('css')
    <link rel="stylesheet" href="{{asset('admin/dataTable/css/dataTable.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css">
    <style>
        a.dt-button {
            background-image: linear-gradient(to bottom, #fff 0%, rgba(173, 194, 253, 0.82) 100%);
            border: none;
            padding: 0;
        }

        .hidden {
            display: none;
        }
        .fa-plus:hover , .fa-minus:hover {
           cursor: pointer;
        }

    </style>

@endsection

@section('content')
    <header class="page-header" style="margin-bottom: 50px">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">View Book</h2>
        </div>
    </header>



    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-11">
                    <div class="card">

                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">View Books</h3>
                        </div>

                        <div class="card-body">

                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Book name</th>
                                    <th>Category name</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th></th>
                                    <th>book name</th>
                                    <th>Category name</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                                </tfoot>
                                <tbody>

                                <tr>

                                    <td><i class="fa fa-plus"></i></td>
                                    <td class="fname">Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                    <input type="hidden" value="QQQQQQQQQQ" class="sumary">
                                </tr>

                                <tr >
                                    <td><i class="fa fa-plus"></i></td>
                                    <td class="fname">TAAAAAAAAn</td>
                                    <td>CCCCCCCCc</td>
                                    <td>dddddddddddd</td>
                                    <td>88</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                    <input type="hidden" value="AWWWWWWWWW" class="sumary">
                                </tr>

                                <tr>
                                    <td><i class="fa fa-plus"></i></td>
                                    <td class="fname">Ashton Cox</td>
                                    <td>Junior Technical Author</td>
                                    <td>San Francisco</td>
                                    <td>66</td>
                                    <td>2009/01/12</td>
                                    <td>$86,000</td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-plus"></i></td>
                                    <td class="fname">Cedric Kelly</td>
                                    <td>Senior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td>22</td>
                                    <td>2012/03/29</td>
                                    <td>$433,060</td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-plus"></i></td>
                                    <td class="fname">Airi Satou</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>33</td>
                                    <td>2008/11/28</td>
                                    <td>$162,700</td>

                                </tr>
                                <tr>
                                    <td><i class="fa fa-plus"></i></td>
                                    <td class="fname">Brielle Williamson</td>
                                    <td>Integration Specialist</td>
                                    <td>New York</td>
                                    <td>61</td>
                                    <td>2012/12/02</td>
                                    <td>$372,000</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </section>



@endsection

@section('script')

    <script src="{{asset('admin/dataTable/js/dataTable.js')}}"></script>
    <script src="{{asset('admin/dataTable/js/dataTableBootStrap.js')}}"></script>
    <script src="{{asset('admin/dataTable/js/dataTableButtons.js')}}"></script>
    <script src="{{asset('admin/dataTable/js/dataTablePdfMake.js')}}"></script>
    <script src="{{asset('admin/dataTable/js/dataTableFonts.js')}}"></script>
    <script src="{{asset('admin/dataTable/js/dataTableBtnHtml.js')}}"></script>

    <script>
        $(document).ready(function () {
            var table = $('#example').DataTable({

                    "scrollX": true,
                    dom: 'Bfrtip',
                    buttons: [
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdfHtml5'
                    ],

                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
            });


            $('a.dt-button').text('');
            $('a.buttons-pdf').append("<img src='{{asset('icons/library/pdf.ico')}}' style= height='30' width='30' />");
            $('a.buttons-csv').append("<img src='{{asset('icons/library/excel.ico')}}' style= height='30' width='30' />");
            $('a.buttons-copy').append("<img src='{{asset('icons/library/copy.ico')}}' style= height='30' width='30' />");


            $('.dt-buttons').after("<select class='form-control' style='width: 200px; float: right;margin-left: 10px;'> " +
                "" +
                "<option value='1'> All</option>" +
                "<option value='2'> Book name</option>" +
                "<option value='3'> Category name </option>" +
                "</select>");


            table.columns(' ').search(' ').draw();

            $('select').on('change', function () {
                var value = $(this).val();
                if (value == 1) {

                    $('.dataTables_filter input').on('keyup', function () {
                        table.columns(' ').search(' ').draw();
                    });
                }

                else if (value == 2) {

                    $('.dataTables_filter input').on('keyup', function () {
                        table.columns(' ').search(' ').draw();
                        table.columns(1).search($(this).val()).draw();
                    });
                }

                else if (value == 3) {
                    $('.dataTables_filter input').on('keyup', function () {
                        table.columns(' ').search(' ').draw();
                        table
                            .columns(2)
                            .search($(this).val())
                            .draw();
                    });
                }
            });


            $('#example tbody').on('click' , 'tr td:first-child',function () {
                var thisIcon = $(this);
                var tr = $(this).parents('tr');
                var row = table.row(tr);

                var newTr = "summary : "+tr.find('.sumary').val(); +"<br>" +
                            "keywords : ccccc, vvv ,bbbbb" +
                            "";


                if(thisIcon.find('i').hasClass('fa-plus')) {
                    row.child(newTr).show();
                    thisIcon.find('i').removeClass('fa-plus');
                    thisIcon.find('i').addClass('fa-minus');
                }else {
                    row.child(newTr).hide();
                    thisIcon.find('i').removeClass('fa-minus');
                    thisIcon.find('i').addClass('fa-plus');
                }
            });
        });

    </script>
@endsection