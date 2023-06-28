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
                                        <h3 class="panel-title">Show Complete Order</h3>
                                        <!-- Custom width modal -->
                                        {{-- <button class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#custom-width-modal">Trash</button> --}}
                                    </div>

                                    <div class="panel-body">

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Qty</th>
                                                            <th>Total</th>
                                                            <th>Pay</th>
                                                            <th>Due</th>
                                                            <th>Order Status</th>
                                                            <th>Order Date</th>
                                                            <th>Payment Status</th></th>
                                                            <th style="width: 10%">Action</th>

                                                        </tr>
                                                    </thead>


                                                    <tbody>
                                                        @foreach ($complete_order as $order_info)
                                                        <tr class="p-2">
                                                            <td>{{ $order_info->name }}</td>
                                                            <td>{{ $order_info->total_products }}</td>
                                                            <td>{{ $order_info->total }}</td>
                                                            <td>{{ $order_info->pay }}</td>
                                                            <td>
                                                                @if ($order_info->due == null)
                                                                    00.00
                                                                @else
                                                                   {{ $order_info->due }}
                                                                @endif
                                                            </td>
                                                            <td><span class="badge badge-pink">{{ $order_info->order_status }} </span></td>
                                                            <td>{{ $order_info->order_date }}</td>
                                                            <td><span  class="badge badge-primary">{{ $order_info->payment_status }}</span></td>
                                                            <td>
                                                                    <div class="btn-group btn-group-justified m-b-10">
                                                                        <a href="{{ route('view.panding.order',$order_info->id) }}" class="btn btn-primary waves-effect waves-light" title="view" role="button"><i class="md  ion-eye"></i></a>
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
