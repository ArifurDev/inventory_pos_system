<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Setting;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class CartController extends Controller
{
    //add to cart
    public function add_cart(Request $request){
        $AddCart = Cart::add(['id' => $request->id, 'name' => $request->name, 'qty' => $request->qty, 'price' => $request->price]);

        if ($AddCart) {
            $notification = array(
                'message' => 'Add to Cart Successfull',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            return redirect()->back();
        }

    }



    //update cart qty
    public function cart_update(Request $request,$rowId){

            $cart_qty_update = Cart::update($rowId, ['qty' => $request->qty]); // Will update the qty

        if ($cart_qty_update) {
                $notification = array(
                'message' => 'Cart Quantity Updated',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            return redirect()->back();
        }
    }


    //selected cart item remove
    public function cart_item_remove($rowId){
        $cart_item = Cart::remove($rowId);
        $notification = array(
            'message' => 'Selected Item Remove',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    //cart invoice
    public function invoice(Request $request){
        $request->validate([
            'cus_id'=>'required|numeric',
        ],
        [
            'cus_id' => 'place select customer',
        ]);
       $setting = Setting::latest()->first();
       $customer_info =  Customer::find($request->cus_id);
       return view('dashbord.Pos.invoice',compact('customer_info','setting'));
    }


    //order information save in database
    public function order_store(Request $request){


         if (!empty($request->pay)) {//just check not empty pay fild

            $input_amount =$request->pay + $request->due;
            $order = Cart::total();
                if ($input_amount > $order) {
                    $notification = array(
                        'message' => 'Your Payment Amount And Your Order Bill not same',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                }else{
                    $data = array();
                    $data['customar_id'] = $request->customer_id;
                    $data['order_date'] = date('d/m/y');
                    $data['order_status'] = 'panding';
                    $data['total_products'] = Cart::count();
                    $data['sub_total'] = Cart::subtotal();
                    $data['vat'] = Cart::tax();//set vat 5%
                    $data['total'] = Cart::total();
                    $data['payment_status'] = $request->payment_status;
                    $data['pay'] = $request->pay;
                    $data['due'] = $request->due;

                    $order_id =  DB::table('orders')->insertGetId($data);


                    //right now insert data in orderdetails table
                    $contant = Cart::content(); //all cart information save this variable
                    foreach ($contant as $contant_item) {
                        $order_data = array();
                        $order_data['order_id'] = $order_id;//same id of orders
                        $order_data['product_id'] = $contant_item->id;
                        $order_data['quentity'] = $contant_item->qty;
                        $order_data['unitcost'] = $contant_item->price;
                        $order_data['total'] = $contant_item->total;

                        //insert order data in orderdatils table
                      $order_insert =  DB::table('orderdatils')->insert($order_data);
                    }
                    if ($order_insert) {
                        Cart::destroy();
                        $notification = array(
                            'message' => 'Complete order',
                            'alert-type' => 'info'
                        );
                        return redirect()->route('dashboard')->with($notification);
                    }else{
                         $notification = array(
                            'message' => 'Plz try agin',
                            'alert-type' => 'error'
                        );
                        return redirect()->route('dashboard')->with($notification);
                    }

                }


         } else {
            $notification = array(
                'message' => 'Required pay fild',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
         }

    }
    //panding order
    public function panding_order(){
        $panding_order =  DB::table('orders')
                        ->join('customers','orders.customar_id','customers.id')
                        ->select('customers.name','customers.email','orders.*')
                        ->where('order_status','panding')->get();
        return view('dashbord.Order.pandingorder',compact('panding_order'));
    }

    //complete order
    public function complete_order(){
        $complete_order =  DB::table('orders')
                        ->join('customers','orders.customar_id','customers.id')
                        ->select('customers.name','customers.email','orders.*')
                        ->where('order_status','complete')->get();
        return view('dashbord.Order.completeorder',compact('complete_order'));
    }

    //view selected order full dateils
    public function view_panding_order($id){
        $order =  DB::table('orders')
                        ->join('customers','orders.customar_id','customers.id')
                        ->select('customers.name','customers.email','customers.address','customers.phone','orders.*')
                        ->where('orders.id',$id)->first();
        $order_datils =  DB::table('orderdatils')
                        ->join('products','orderdatils.product_id','products.id')
                        ->select('products.product_code','products.product_name','orderdatils.*')
                        ->where('order_id',$id)->get();
        $setting = Setting::latest()->first();
        return view('dashbord.Order.invoice',compact('order','order_datils','setting'));
    }

    public function order_status_change($id)
    {

         DB::table('orders')->where('id',$id)->update([
            'order_status' => 'complete'
         ]);
         $notification = array(
            'message' => 'Complete This Order',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notification);
    }

    public function download_invoice($id)
    {
        $order =  DB::table('orders')
                        ->join('customers','orders.customar_id','customers.id')
                        ->select('customers.name','customers.email','customers.address','customers.phone','orders.*')
                        ->where('orders.id',$id)->first();
        $order_datils =  DB::table('orderdatils')
                        ->join('products','orderdatils.product_id','products.id')
                        ->select('products.product_code','products.product_name','orderdatils.*')
                        ->where('order_id',$id)->get();
        $setting = Setting::latest()->first();

        $pdf = PDF::loadView('dashbord.Order.download',compact('order','order_datils','setting'));
	    return $pdf->download('Invoice.pdf');
    }

}
