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
                                    <div class="panel-heading">
                                        <h3 class="panel-title">All Empolyee</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>
                                                            <th>Photo</th>
                                                            <th>NID No.</th>
                                                            <th>Salary</th>
                                                            <th>Vacation</th>
                                                            <th>Experience</th>
                                                            <th>city</th>
                                                            <th>Address</th>

                                                        </tr>
                                                    </thead>


                                                    <tbody>
                                                        @foreach ($empolyees as $empolyee)
                                                            <tr>
                                                                <td>{{ $empolyee->name }}</td>
                                                                <td>{{ $empolyee->email }}</td>
                                                                <td>{{ $empolyee->phone }}</td>
                                                                <td>
                                                                    <img  style="width: 70px; height: 70px; " src="{{ asset('upload/empolyee_image') }}/{{ $empolyee->photo }}" >
                                                                </td>
                                                                <td>{{ $empolyee->nid_number }}</td>
                                                                <td>{{ $empolyee->salary }}tk</td>
                                                                <td>{{ $empolyee->vacation }}</td>
                                                                <td>{{ $empolyee->experience }}</td>
                                                                <td>{{ $empolyee->city }}</td>
                                                                <td>{{ $empolyee->address }}</td>

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
