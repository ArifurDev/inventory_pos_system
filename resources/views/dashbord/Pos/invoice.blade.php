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
                                                                                        <!-- sample modal content -->
                                                                                        <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                                                                            <div class="modal-dialog" >
                                                                                                <div class="modal-content">
                                                                                                    <div class="modal-header">
                                                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                                                            <h4 class="modal-title" id="custom-width-modalLabel">Order Payment</h4>
                                                                                                    </div>


                                                                                                    <div class="modal-body">
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
                                                                                                        <h4>{{ $customer_info->name }}</h4>
                                                                                                        <h4>Total: {{ Cart::total(); }}</h4>
                                                                                                    </div>
                                                                                                   
                                                                                                        <form role="form"  action="{{ route('store.order') }}" method="POST" >
                                                                                                            @csrf
                                                                                                            <div class="row">
                                                                                                                    <input type="hidden" name="customer_id" value="{{ $customer_info->id }}">
                                                                                                                    <div class="form-group">
                                                                                                                        <label for="payment_status">Payment Status</label>
                                                                                                                        <select class="form-control" id="payment_status" name="payment_status">
                                                                                                                            <option value="handcash">Hand Cash</option>
                                                                                                                            <option value="check">Check</option>
                                                                                                                            <option value="due">Due</option>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                    <div class="form-group">
                                                                                                                        <label for="Pay">Pay</label>
                                                                                                                        <input type="number" class="form-control" id="Pay" placeholder="Pay" name="pay" min="0">
                                                                                                                    </div>
                                                                                                                    <div class="form-group">
                                                                                                                        <label for="Due">Due</label>
                                                                                                                        <input type="number" class="form-control" id="Due" placeholder="Due" name="due" min="0">
                                                                                                                    </div>




                                                                                                            </div>



                                                                                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                                                                                        </form>

                                                                                                    </div>

                                                                                                </div><!-- /.modal-content -->
                                                                                              </div><!-- /.modal-dialog -->
                                                                                    </div><!-- /.modal -->
                                        <div class="hidden-print">
                                            <div class="pull-right">
                                                <a href="#" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#custom-width-modal">Submit</button>

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
