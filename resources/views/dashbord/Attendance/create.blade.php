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
                                        <h3 class="panel-title">Attendance</h3>
                                        <!-- Custom width modal -->
                                    </div>


                                    <div class="panel-body">
                                        @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                                <ul>
                                                    <li>
                                                        <p class="text-light">{{ $error }}</p>
                                                    </li>
                                                </ul>
                                        @endforeach
                                       @endif
                                        <div class="row">
                                            <tr>
                                                <td >{{ date("d/m/y") }}</td>
                                            </tr>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>
                                                            <th>Photo</th>
                                                            <th>Attendances</th>


                                                        </tr>
                                                    </thead>


                                                    <tbody>
                                                       <form action="{{ route('attendance.store') }}" method="post">
                                                        @csrf
                                                        @foreach ($empolyee_info as $empolyee)
                                                            <tr>
                                                                <td>{{ $empolyee->name }}</td>
                                                                <td style="width:10px">{{ $empolyee->email }}</td>
                                                                <td>{{ $empolyee->phone }}</td>
                                                                <td>
                                                                    <img  style="width: 70px; height: 70px; " src="{{ asset('upload/empolyee_image') }}/{{ $empolyee->photo }}" >
                                                                </td>
                                                                <input type="hidden" value="{{ $empolyee->id }}"  name="empolyee_id[]">
                                                                <td>
                                                                    <input type="radio" name="attendances[{{ $empolyee->id }}]"  value="present">Present
                                                                    <input style="margin-left: 2%" type="radio" name="attendances[{{ $empolyee->id }}]"  value="apsent">Apsent

                                                                </td>
                                                                <input type="hidden" name="date" id="" value="{{ date("d/m/y") }}">

                                                            </tr>
                                                        @endforeach
                                                        <button type="submit" class="btn btn-primary ">Take Attendance</button>
                                                       </form>
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
