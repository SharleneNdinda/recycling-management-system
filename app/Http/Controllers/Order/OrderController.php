<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Offer;
use App\Models\Order;
use Illuminate\Database\QueryException;

class OrderController extends Controller
{
    public function order_create(Request $request)

    {
     
           $this->validate($request, [
              
            'offer_id'=> 'required ',
            'collectioncenter_id'=> 'required ',
            'recyclingplant_id'=> 'required ',
          ]);
          
              $order = new Order();
              $order->offer_id = request('offer_id');
              $order->collectioncenter_id = request('collectioncenter_id');
              $order->recyclingplant_id = request('recyclingplant_id');
              $order->save();

            // set accepted = 1
             $query = DB::table('offers')
             ->where('offer_id',  '=' , $request['offer_id'] )
             ->update([
             'accepted' =>1,
             ]);
              
              return redirect()->route('plantoffers.view');
    }

       public function order_view(Request $request)

    {

         $orders = DB::table('orders')
            ->where ('orders.recyclingplant_id', '=', Auth::id() )
            ->where ('orders.payment_made', '=', null )
            ->get();
        flashy()->primary('Wohoo, Lets check todays offers');

      return view('recyclingplant.orders', ['orders'=>$orders]);
    }

      //// order view for collection centers ////////////////
      public function collectioncenter_order_view(Request $request)

    {
         $orders = DB::table('orders')
            ->where ('orders.collectioncenter_id', '=', Auth::id() )
            ->where ('orders.payment_made', '=', 1 )
            ->where ('orders.status', '=', null )
            ->get();

        flashy()->primary('Wohoo, Lets check todays orders');

      return view('collectioncenter.orders', ['orders'=>$orders]);
    }


      public function order_detail($orderID)

    {
         $data = Order::find($orderID);


          $order = DB::table('orders')
            ->leftJoin('offers', 'orders.offer_id', '=', 'offers.offer_id')
            ->where('orders.order_id', '=', $orderID )
            ->get();


      return view('recyclingplant.order_detail', ['order'=>$order]);
    }

    

     public function collectioncenter_order_detail($orderID)

    {
         $data = Order::find($orderID);


          $order = DB::table('orders')
            ->leftJoin('offers', 'orders.offer_id', '=', 'offers.offer_id')
            ->leftJoin('bids', 'offers.bid_id', '=', 'bids.bidID')
            ->where('orders.order_id', '=', $orderID )
            ->get();


      return view('collectioncenter.order_detail', ['order'=>$order]);
    }

}
