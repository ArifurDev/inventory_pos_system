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

                                        </div>
                                        <div style="margin-left: 3px">
                                            <span >All Category</span>
                                            @foreach ($Category as $Category_item)
                                            <span class="btn btn-primary " style="margin-top: 2px">{{ $Category_item->category_name }}</span>
                                            @endforeach

                                        </div>

                                    <div class="panel-body">

                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="panel">

                                                    <br>
                                                    <div class="price_card text-center">
                                                        <table  class="table table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Qty</th>
                                                                    <th>S.price </th>
                                                                    <th>T.price</th>
                                                                    <th>Action </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                {{-- show cart item start--}}
                                                                    <?php
                                                                        $cart_item_show = Cart::content();
                                                                    ?>
                                                                {{-- show cart item End--}}
                                                                @foreach ($cart_item_show as $cart_item)
                                                                    <tr>
                                                                        <td>{{ $cart_item->name }}</td>
                                                                        <td>
                                                                            <form action="{{ route('update.cart',$cart_item->rowId) }}" method="post" style="margin-top: -20px">
                                                                                @csrf
                                                                                <input type="number" min="1" style="width: 40%" value="{{ $cart_item->qty }}" name="qty">
                                                                                <button type="submit"> <i class="md md-done"></i></button>
                                                                            </form>
                                                                        </td>
                                                                        <td>{{ $cart_item->price }}</td>
                                                                        <td>{{ $cart_item->price*$cart_item->qty }}</td>
                                                                        <td>
                                                                            <a href="{{  route('remove.cart.item',$cart_item->rowId) }}" class="btn btn-icon waves-effect waves-light btn-danger "> <i class="fa fa-remove"></i> </a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                        <div class="pricing-header bg-primary">
                                                            <span>Total Quentaty : {{ Cart::count(); }}</span><br>
                                                            <span>Price : {{ Cart::subtotal(); }}</span><br>
                                                            <span>Vat : {{ Cart::tax(); }} (5%)</span><br>
                                                            <span>Total Price : {{ Cart::total(); }}</span><br>



                                                        </div>


                                                    </div>
                                                    <form action="{{ route('cart.invoice') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            @if ($errors->any())
                                                            @foreach ($errors->all() as $error)
                                                                    <ul>
                                                                        <li>
                                                                            <p class="text-light">{{ $error }}</p>
                                                                        </li>
                                                                    </ul>
                                                            @endforeach
                                                           @endif
                                                            <div class="col-sm-7">
                                                                <select class="form-control" name="cus_id">
                                                                    <option >Select Customer</option>
                                                                    @foreach ($Customer as $customer)
                                                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#custom-width-modal">Add Cusstomer</button>

                                                        </div>
                                                        <button type="submit" class="btn btn-danger waves-effect waves-light" style="margin-left: 40%;margin-top: 5%;margin-bottom: 2%;">Invoice</button>
                                                    </form>

                                                </div>

                                            </div>
                                                <!-- sample modal content -->
                                        <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog" >
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h4 class="modal-title" id="custom-width-modalLabel">Create Customer</h4>
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

                                                        <form role="form"  action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="name">Name</label>
                                                                        <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="email">Email</label>
                                                                        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="phone">Phone</label>
                                                                        <input type="number" class="form-control" id="phone" placeholder="Enter valide Number" name="phone" min="0">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="shopName">Shop Name</label>
                                                                        <input type="text" class="form-control" id="shopName" placeholder="shopName"  name="shopName">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="account_holder">Account Holder</label>
                                                                        <input type="text" class="form-control" id="account_holder" placeholder="Account Holder" name="account_holder">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="account_number">Account Number</label>
                                                                        <input type="number" class="form-control" id="account_number" placeholder="Account Number" name="account_number" min="0">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="bank_name">Bank Name</label>
                                                                        <input type="text" class="form-control" id="bank_name" placeholder="Bank Name" name="bank_name" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="bank_branch">Bank Branch</label>
                                                                        <input type="text" class="form-control" id="bank_branch" placeholder="Bank Branch" name="bank_branch">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="city">City</label>
                                                                        <input type="text" class="form-control" id="city" placeholder="City" name="city">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="Address">Address</label>
                                                                        <input type="text" class="form-control" id="Address" placeholder="Address" name="address">
                                                                    </div>
                                                                     <div class="form-group">
                                                                        <img  style="width: 70px; height: 70px; " src="" id="image" ><br>
                                                                        <label for="Photo">Photo</label>
                                                                        <input type="file" class="form-control" id="photo"  name="photo" accept="image/*" onchange="readURL(this)">
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                                        </form>

                                                    </div>

                                                </div><!-- /.modal-content -->
                                              </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                            <div class="col-md-5">

                                                <br>
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Image</th>
                                                            <th>Name</th>
                                                            <th>Category</th>
                                                            <th>Code</th>
                                                            <th>Price </th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                        @foreach ($product as $item)

                                                            <tr>
                                                                <form action="{{ route('add.cart') }}" method="POST">
                                                                    @csrf
                                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                                        <input type="hidden" name="name" value="{{ $item->product_name }}">
                                                                        <input type="hidden" name="qty" value="1">
                                                                        <input type="hidden" name="price" value="{{ $item->seling_price }}">
                                                                    <td>
                                                                        <img  style="width: 60px; height: 60px; " src="{{ asset('upload/product_image') }}/{{ $item->product_image }}" >
                                                                    </td>
                                                                    <td>{{ $item->product_name }}</td>
                                                                    <td>{{ $item->category_name }}</td>
                                                                    <td>{{ $item->product_code }}</td>
                                                                    <td>{{ $item->seling_price }}</td>
                                                                    <td> <button type="submit"  class="btn btn-primary"><i class="md md-add"></i></button></td>
                                                               </form>
                                                            </tr>

                                                        @endforeach

                                                    <tbody>

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
