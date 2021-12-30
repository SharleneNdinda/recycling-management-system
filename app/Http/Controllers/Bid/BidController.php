<?php

namespace App\Http\Controllers\Bid;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Bid;
use Illuminate\Database\QueryException;

class BidController extends Controller

{
 
    public function index()

    {

         $rate = DB::table('rates')
        ->where ('recyclingplant_id', '=', Auth::id() )
        ->get();

          $bid = DB::table('bids')
        ->where ('recyclingplant_id', '=', Auth::id() )
        ->get();


        flashy()->primary('Create Your Bid Here!');
        return view('recyclingplant.bid', ['rate'=>$rate, 'bid'=>$bid]);
    }

    // Store New Bids
      public function store(Request $request)
    {
            $this->validate($request, [
              
            'description'=> 'required ',
            'rate'=> 'required ',
            'recyclingplant_id'=> 'required ',
          ]);
              try
    {
              $bid = new Bid();  
              $bid->recyclingplant_id = request('recyclingplant_id');
              $bid->plant_name = request('plant_name');
              $bid->rate = request('rate');
              $bid->description = request('description');
              $bid->save();
              
         } catch(QueryException $e) {

         if ($e->getCode() === '23000') { // integrity constraint violation
                   return back()->with('message', 'Sorry! You can only update your details');
         }
    }

               flashy()->primary('Wohoo! New Bid!');
               return redirect()->route('bid.view');

    }

      public function bid_update(Request $request)
    {
         $query = DB::table('bids')
            ->where('recyclingplant_id',  '=' , $request['recyclingplant_id'] )
            ->update([
            'description' => $request['description'], 
            'rate' => $request['rate'], 
           ]);

        return redirect()->route('bid.view');
    }

}
