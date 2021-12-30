<?php

namespace App\Http\Controllers\Rate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Rate;
use Illuminate\Database\QueryException;

class RateController extends Controller
{
    public function index()

    {

        $rate = DB::table('rates')
        ->where ('recyclingplant_id', '=', Auth::id() )
        ->get();

        flashy()->primary('Setup Your Rates Here 🙌  ');
        return view('recyclingplant.rate' , ['rate'=>$rate]);
    }

    public function store(Request $request)
    {
            $this->validate($request, [
              
            'amount_of_plastic'=> 'required ',
            'rate_name'=> 'required ',
            'buying_rate'=> 'required ',
            'recyclingplant_id'=> 'required ',
          ]);
              try
    {
              $rate = new Rate();
              $rate->amount_of_plastic = request('amount_of_plastic');
              $rate->rate_name = request('rate_name');
              $rate->buying_rate = request('buying_rate');
              $rate->recyclingplant_id = request('recyclingplant_id');
              $rate->save();
              
         } catch(QueryException $e) {

         if ($e->getCode() === '23000') { // integrity constraint violation
                   return back()->with('message', 'Sorry! You can only update your details');
         }
    }

               return redirect()->route('rate.view');

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
