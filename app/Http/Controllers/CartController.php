<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Setting;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;


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
}
