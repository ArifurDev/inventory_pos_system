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
                            <div class="col-md-2"></div>
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading ">
                                        <h3 class="panel-title">All Category</h3>
                                        <!-- Custom width modal -->
                                        <button class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#custom-width-modal">Trash</button>
                                    </div>

                                         <!-- sample modal content -->
                                        <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog" style="width:40%;">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="custom-width-modalLabel">Category trashbin</h4>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Name</th>
                                                                            <th>Image</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($category_trash as $trash)
                                                                        <tr>
                                                                            <td>{{ $trash->category_name }}</td>
                                                                            <td>
                                                                                <img  style="width: 70px; height: 70px; " src="{{ asset('upload/category_image') }}/{{ $trash->image }}" >
                                                                            </td>
                                                                            <td>
                                                                                    <div class="btn-group btn-group-justified m-b-10">
                                                                                        <a href="{{ route('Category.restore',$trash->id) }}" class="btn btn-danger waves-effect waves-light" title="edit" role="button"><i class="md  md-edit"></i></a>
                                                                                        <a href="{{ route('Category.delete',$trash->id) }}" class="btn btn-primary waves-effect waves-light" title="delete" role="button"><i class="md md-delete"></i></a>
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
                                                            <th>Image</th>
                                                            <th>Action</th>

                                                        </tr>
                                                    </thead>


                                                    <tbody>
                                                        @foreach ($category as $info)
                                                            <tr>
                                                                <td>{{ $info->category_name }}</td>
                                                                <td>
                                                                    <img  style="width: 70px; height: 70px; " src="{{ asset('upload/category_image') }}/{{ $info->image }}" >
                                                                </td>
                                                                <td>

                                                                            <a href="{{ route('Category.edit',$info->id) }}" class="btn btn-danger waves-effect waves-light" title="edit" role="button"><i class="md  md-edit"></i></a>

                                                                        <form action="{{ route('Category.destroy',$info->id) }}" method="post">
                                                                        @csrf
                                                                        @method('DELETE')
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
