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
                                        <h3 class="panel-title">All Customer</h3>
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
                                                                            <th>address</th>
                                                                            <th>shopName</th>
                                                                            <th>bank_name</th>
                                                                            <th>city</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($customers_trash as $trash_info)
                                                                        <tr>
                                                                            <td>{{ $trash_info->name }}</td>
                                                                            <td >{{ $trash_info->email }}</td>
                                                                            <td>{{ $trash_info->phone }}</td>
                                                                            <td>
                                                                                <img  style="width: 70px; height: 70px; " src="{{ asset('upload/customer_image') }}/{{ $trash_info->photo }}" >
                                                                            </td>
                                                                            <td>{{ $trash_info->address }}</td>
                                                                            <td>{{ $trash_info->shopName }}</td>
                                                                            <td>{{ $trash_info->bank_name }}</td>
                                                                            <td>{{ $trash_info->city }}</td>
                                                                            <td>
                                                                                    <div class="btn-group btn-group-justified m-b-10">
                                                                                        <a href="{{ route('customer.restore',$trash_info->id) }}" class="btn btn-primary waves-effect waves-light" title="restore" role="button"><i class="md  md-restore"></i></a>
                                                                                        <a href="{{ route('customer.delete',$trash_info->id) }}" class="btn btn-danger waves-effect waves-light" title="remove" role="button"><i class="md  md-highlight-remove"></i></a>
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
                                                          <th>address</th>
                                                          <th>shopName</th>
                                                          <th>bank_name</th>
                                                          <th>city</th>
                                                          <th>Action</th>
                                                        </tr>
                                                    </thead>


                                                    <tbody>
                                                        @foreach ($customers as $customers)
                                                        <tr>
                                                            <td>{{ $customers->name }}</td>
                                                            <td >{{ $customers->email }}</td>
                                                            <td>{{ $customers->phone }}</td>
                                                            <td>
                                                                <img  style="width: 70px; height: 70px; " src="{{ asset('upload/customer_image') }}/{{ $customers->photo }}" >
                                                            </td>
                                                            <td>{{ $customers->address }}</td>
                                                            <td>{{ $customers->shopName }}</td>
                                                            <td>{{ $customers->bank_name }}</td>
                                                            <td>{{ $customers->city }}</td>
                                                            <td>
                                                                    <div class="btn-group btn-group-justified m-b-10">
                                                                        <a href="" class="btn btn-primary waves-effect waves-light" title="view" role="button"><i class="md  md-remove-red-eye"></i></a>
                                                                        <a href="{{ route('customer.edit',['customer'=>$customers->id]) }}" class="btn btn-danger waves-effect waves-light" title="edit" role="button"><i class="md md-mode-edit"></i></a>
                                                                    </div>
                                                                    <form action="{{ route('customer.destroy',['customer'=>$customers->id]) }}" method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn btn-primary waves-effect waves-light" title="delete tmp" type="submit"><i class="md md-delete"></i></button>
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
