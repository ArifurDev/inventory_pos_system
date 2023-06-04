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
                        <div class="row ">
                            <div class="col-md-2"></div>
                            <!-- Basic example -->
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Product Edit</h3></div>

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

                                        <form role="form"  action="{{ route('Product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Category Name</label>
                                                        <select class="form-control form-white" data-placeholder="Supplier Type" name="category_id">
                                                           @foreach ($category as $category)
                                                           <option value="{{ $category->id }}" @selected($category->id  === $product->category_id)>{{ $category->category_name }}</option>
                                                           @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Supplier Name</label>
                                                        <select class="form-control form-white" data-placeholder="Supplier Type" name="supplier_id">
                                                            @foreach ($supplier as $supplier)
                                                            <option value="{{ $supplier->id }}" @selected($supplier->id  === $product->supplier_id)>{{ $supplier->name }}</option>
                                                            @endforeach
                                                         </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Product">Product Name</label>
                                                        <input type="text" class="form-control" id="Product" placeholder="Product Name" name="product_name" value="{{ $product->product_name }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Code">Product Code</label>
                                                        <input type="text" class="form-control" id="Code" placeholder="Product Code"  name="product_code" value="{{ $product->product_code }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Storehouse">Product Storehouse</label>
                                                        <input type="text" class="form-control" id="Storehouse" placeholder="Product Storehouse" name="product_storehouse" value="{{ $product->product_storehouse }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Route">Product Route</label>
                                                        <input type="text" class="form-control" id="Route" placeholder="Product Route" name="product_route" value="{{ $product->product_route }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="buy_date">Buy Date</label>
                                                        <input type="date" class="form-control" id="buy_date" name="buy_date" value="{{ $product->buy_date }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="expaire_date">Expaire Date</label>
                                                        <input type="date" class="form-control" id="expaire_date" name="expaire_date" value="{{ $product->expaire_date }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="buying_price">Buying Price</label>
                                                        <input type="number" class="form-control" id="buying_price" placeholder="Buying Price" name="buying_price" min="0" value="{{ $product->buying_price }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Address">Seling Price</label>
                                                        <input type="number" class="form-control" id="Address" placeholder="Seling Price" name="seling_price" min="0" value="{{ $product->seling_price }}">
                                                    </div>
                                                     <div class="form-group">
                                                        <img  style="width: 70px; height: 70px; " src="{{ asset('upload/product_image') }}/{{ $product->product_image }}" id="image" ><br>
                                                        <label for="Photo">Product Image</label>
                                                        <input type="file" class="form-control" id="photo"  name="product_image" accept="image/*" onchange="readURL(this)">
                                                    </div>
                                                </div>
                                            </div>



                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
                        </div>
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
    </body>
</html>
