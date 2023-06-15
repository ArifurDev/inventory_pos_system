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
                                        <h3 class="panel-title">Setting</h3>
                                    </div>
                                    <div class="panel-body">

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                          <th>Name</th>
                                                          <th>Phone</th>
                                                          <th>Logo</th>
                                                          <th>City</th>
                                                          <th>Address</th>
                                                          <th style="width: 10%">Action</th>
                                                        </tr>
                                                    </thead>


                                                    <tbody>
                                                        @foreach ($setting as $setting_info)
                                                        <tr>
                                                            <td>{{ $setting_info->name }}</td>
                                                            <td >{{ $setting_info->phone }}</td>
                                                            <td>
                                                                <img  style="width: 70px; height: 70px; " src="{{ asset('upload/Setting_image') }}/{{ $setting_info->logo }}" >
                                                            </td>
                                                            <td>{{ $setting_info->city }}</td>
                                                            <td>{{ $setting_info->address }}</td>

                                                            <td>
                                                                    <div class="btn-group btn-group-justified m-b-10">
                                                                        <a href="{{ route('setting.edit',$setting_info->id) }}" class="btn btn-danger waves-effect waves-light" title="edit" role="button"><i class="md md-mode-edit"></i></a>
                                                                    </div>
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
