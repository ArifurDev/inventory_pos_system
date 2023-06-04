<!DOCTYPE html>
<html>
    <head>
        @include('dashbord.header')
    </head>



    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
             @include('dashbord.navbar')
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            @include('dashbord.left_sife_menu')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading ">
                                        <h3 class="panel-title">Expense list</h3>
                                        <!-- Custom width modal -->
                                        </div>



                                    <div class="panel-body">

                                        <div class="row">
                                            <div class="col-md-2 col-sm-2 col-xs-2"></div>
                                            <div class="col-md-8 col-sm-8 col-xs-8">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Amount</th>
                                                            <th>Date</th>
                                                            <th>Note</th>
                                                            <th style="width: 20%">Action</th>

                                                        </tr>
                                                    </thead>


                                                    <tbody>
                                                        @foreach ($expense as $expense_info)
                                                            <tr>
                                                                <td>{{ $expense_info->amount }}tk</td>
                                                                <td>{{ $expense_info->date }}</td>
                                                                <td>{{ $expense_info->note }}</td>
                                                                <td>
                                                                        <div class="btn-group btn-group-justified " >
                                                                            <a href="{{ route("expense.edit",$expense_info->id) }}" class="btn btn-danger waves-effect waves-light" title="edit" role="button"><i class="md  md-edit"></i></a>
                                                                        </div>
                                                                        <form action="{{ route("expense.destroy",$expense_info->id) }}" method="post">
                                                                            @csrf
                                                                            @method("DELETE")
                                                                            <button type="submit" class="btn btn-primary waves-effect waves-light" title="delete" role="button"><i class="md md-delete"></i></button>
                                                                        </form>
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- End Row -->


                    </div> <!-- container -->



                    </div>

                </div> <!-- content -->
                <footer class="footer text-right">
                    2015 © Moltran.
                </footer>
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->

            <!-- ============================================================== -->
            <!-- Right Sidebar -->
             @include('dashbord.right_slider')
            <!-- /Right-bar -->

        </div>

        <!-- END wrapper -->
       @include('dashbord.script')<!--script link-->
        <!-- COPY TO JAVASCRIPT SECTION  -->
        <script type="text/javascript">
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#image')
                            .attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

        </script>
        <!--datatables-->
         <script src="{{ asset('dashbord') }}/assets/datatables/jquery.dataTables.min.js"></script>
         <script src="{{ asset('dashbord') }}/assets/datatables/dataTables.bootstrap.js"></script>


         <script type="text/javascript">
             $(document).ready(function() {
                 $('#datatable').dataTable();
             } );
         </script>
    </body>
</html>
