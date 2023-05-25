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
                                        <h3 class="panel-title">All Empolyee</h3>
                                        <!-- Custom width modal -->
                                        <button class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#custom-width-modal">Trash</button>
                                    </div>

                                         <!-- sample modal content -->
                                        <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog" style="width:90%;">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="custom-width-modalLabel">Modal Heading</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                           
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Name</th>
                                                                            <th>Email</th>
                                                                            <th>Phone</th>
                                                                            <th>Photo</th>
                                                                            <th>Salary</th>
                                                                            <th>Vacation</th>
                                                                            <th>city</th>
                                                                            <th>Address</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($empolyees_trash as $trash)
                                                                        <tr>
                                                                            <td>{{ $trash->name }}</td>
                                                                            <td style="width:10px">{{ $trash->email }}</td>
                                                                            <td>{{ $trash->phone }}</td>
                                                                            <td>
                                                                                <img  style="width: 70px; height: 70px; " src="{{ asset('upload/empolyee_image') }}/{{ $trash->photo }}" >
                                                                            </td>
                                                                            <td>{{ $trash->salary }}tk</td>
                                                                            <td>{{ $trash->vacation }}</td>
                                                                            <td>{{ $trash->city }}</td>
                                                                            <td>{{ $trash->address }}</td>
                                                                            <td>
                                                                                    <div class="btn-group btn-group-justified m-b-10">
                                                                                        <a href="{{ route('restore.empolyee',['id'=>$trash->id]) }}" class="btn btn-danger waves-effect waves-light" title="restore" role="button"><i class="md  md-restore"></i></a>
                                                                                        <a href="{{ route('delete.empolyee',['empolyee'=>$trash->id]) }}" class="btn btn-primary waves-effect waves-light" title="remove" role="button"><i class="md md-highlight-remove"></i></a>
                                                                                    </div>
                                                                            </td>

                                                                        </tr>
                                                                    @endforeach


                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>

                                                    </div><!-- /.modal-content -->
                                                  </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

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
                                                            <th>Salary</th>
                                                            <th>Vacation</th>
                                                            <th>city</th>
                                                            <th>Address</th>
                                                            <th>Action</th>

                                                        </tr>
                                                    </thead>


                                                    <tbody>
                                                        @foreach ($empolyees as $empolyee)
                                                            <tr>
                                                                <td>{{ $empolyee->name }}</td>
                                                                <td style="width:10px">{{ $empolyee->email }}</td>
                                                                <td>{{ $empolyee->phone }}</td>
                                                                <td>
                                                                    <img  style="width: 70px; height: 70px; " src="{{ asset('upload/empolyee_image') }}/{{ $empolyee->photo }}" >
                                                                </td>
                                                                <td>{{ $empolyee->salary }}tk</td>
                                                                <td>{{ $empolyee->vacation }}</td>
                                                                <td>{{ $empolyee->city }}</td>
                                                                <td>{{ $empolyee->address }}</td>
                                                                <td>
                                                                        <div class="btn-group btn-group-justified m-b-10">
                                                                            <a href="{{ route('single.empolyee',['empolyee'=>$empolyee->id]) }}" class="btn btn-primary waves-effect waves-light" title="view" role="button"><i class="md  ion-eye"></i></a>
                                                                            <a href="{{ route('edit.empolyee',['empolyee'=>$empolyee->id]) }}" class="btn btn-danger waves-effect waves-light" title="edit" role="button"><i class="md  md-edit"></i></a>
                                                                            <a href="{{ route('destroy.empolyee',['empolyee'=>$empolyee->id]) }}" class="btn btn-primary waves-effect waves-light" title="delete" role="button"><i class="md md-delete"></i></a>
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
