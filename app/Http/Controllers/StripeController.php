<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Stripe;
use Session;
use Auth;
use App\Models\Order;
use Illuminate\Support\Facades\DB;


class StripeController extends Controller
{
    /**
     * payment view
     */
   
  
    /**
     * handling payment with POST
     */
    public function handlePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" =>  $request->amount,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Payment Made For Order." 
        ]);

          $query = DB::table('orders')
            ->where('order_id', '=' , $request->order_id)
            ->update([
            'payment_made' => 1, 
           ]);
  
        Session::flash('success', 'Payment has been successfully processed.');
        return back();
    }

    public function payment_view($orderID)
    {
             $data = Order::find($orderID);

             $order = DB::table('orders')
            ->leftJoin('offers', 'orders.offer_id', '=', 'offers.offer_id')
            ->where('orders.order_id', '=', $orderID )
            ->get();

             $rate = DB::table('rates')
            ->where('rates.recyclingplant_id', '=', Auth::id())
            ->get();


         return view('recyclingplant.stripepayment', ['order'=>$order, 'rate'=>$rate]);
    }
}