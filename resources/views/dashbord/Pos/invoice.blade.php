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
                                    <!-- <div class="panel-heading">
                                        <h4>Invoice</h4>
                                    </div> -->
                                    <div class="panel-body">
                                        <div class="clearfix">
                                            <div class="pull-left">
                                                <address>
                                                    <strong>{{ $setting->name }}, Inc.</strong><br>
                                                    {{ $setting->address }}<br>                   
                                                    <abbr title="Phone">P:</abbr> {{ $setting->phone }}
                                                </address>
                                            </div>
                                            <div class="pull-right">
                                                <h4>Invoice # <br>
                                                    <strong>{{ date("d/m/y") }}</strong>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr>
                                      
                                        <div class="row">
                                            <div class="col-md-12">
                                                
                                                <div class="pull-left m-t-30">
                                                    <address>
                                                      <strong>{{ $customer_info->name }}, Inc.</strong><br>
                                                      {{ $customer_info->address }}<br>                   
                                                      <abbr title="Phone">P:</abbr> {{ $customer_info->phone }}
                                                      </address>
                                                </div>
                                                <div class="pull-right m-t-30">
                                                    <p><strong>Order Date: </strong> {{ date("M d,Y") }}</p>
                                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>
                                                    <p class="m-t-10"><strong>Order ID: </strong> #123456</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-h-50"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table m-t-30">
                                                        <thead>
                                                            <tr><th>#</th>
                                                            <th>Item</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Cost</th>
                                                            <th>Total</th>
                                                        </tr></thead>
                                                        <tbody>
                                                            {{-- show cart item start--}}
                                                                <?php
                                                                     $cart_item_show = Cart::content();
                                                                     $count = 1;
                                                                ?>
                                                            {{-- show cart item End--}}
                                                            @foreach ($cart_item_show as $item)
                                                            <tr>
                                                                <td>{{ $count++ }}</td>
                                                                <td>{{ $item->name }}</td>                                                               
                                                                <td>{{ $item->qty }}</td>
                                                                <td>{{ $item->price }}</td>
                                                                <td>{{ $item->price*$item->qty }}</td>
                                                            </tr>
                                                            @endforeach
                                                         
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px;">
                                            <div class="col-md-3 col-md-offset-9">
                                                <p class="text-right"><b>Sub-total:</b> {{ Cart::subtotal(); }}</p>                                              
                                                <p class="text-right">VAT: {{ Cart::tax(); }} (5%)</p>
                                                <hr>
                                                <h3 class="text-right">Total: {{ Cart::total(); }}</h3>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="hidden-print">
                                            <div class="pull-right">
                                                <a href="#" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                <a href="#" class="btn btn-primary waves-effect waves-light">Submit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>


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
