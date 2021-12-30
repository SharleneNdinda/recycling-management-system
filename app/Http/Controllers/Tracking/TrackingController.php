<?php

namespace App\Http\Controllers\Tracking;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Tracking;
use Illuminate\Database\QueryException;

class TrackingController extends Controller
{
    public function index()

    {

        $tracked = DB::table('trackings')
        ->Join('orders', 'trackings.order_id', '=', 'orders.order_id')
        ->where ('collectioncenter_id', '=', Auth::id() )
        ->get();

        flashy()->primary('Wohoo you dispatched some orders! ');
        return view('collectioncenter.dispatch' , ['tracked'=>$tracked]);
    }

      public function plant_tracking()

    {

        $tracked = DB::table('trackings')
        ->Join('orders', 'trackings.order_id', '=', 'orders.order_id')
        ->where ('recyclingplant_id', '=', Auth::id() )
        ->get();

        flashy()->primary('Wohoo you dispatched some orders! ');
        return view('recyclingplant.tracking' , ['tracked'=>$tracked]);
    }

    public function store(Request $request)
    {
            $this->validate($request, [
              
            'status'=> 'required ',
            'order_id'=> 'required ',
          ]);
              
              $track = new Tracking();
              $track->order_id = request('order_id');
              $track->status = request('status');
              $track->save();


               return back()->with('message', 'Your Order Has Been Dispatched');

    }

      public function update_rate(Request $request)

    {

         $query = DB::table('rates')
            ->where('recyclingplant_id',  '=' , $request['recyclingplant_id'] )
            ->update([
            'rate_name' => $request['rate_name'], 
            'amount_of_plastic' => $request['amount_of_plastic'], 
            'buying_rate' => $request['buying_rate'], 
    ]);

        return redirect()->route('rate.view');
    }
}
