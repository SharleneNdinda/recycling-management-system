<?php

namespace App\Http\Controllers\Marketplace;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Bid;

class MarketplaceController extends Controller
{
    public function index() 

    {

             $bids = DB::table('bids')
            ->leftJoin('users', 'bids.recyclingplant_id', '=', 'users.id')
            ->leftJoin('rates', 'bids.rate', '=', 'rates.rateID')
            ->get();

          
        flashy()->primary('Lets Explore 🙌  ');
        return view('collectioncenter.marketplace', ['bids'=>$bids]);
    } 

    public function plants_marketplace(Request $request)
    {
        //marketplace for recycling plants
        
        flashy()->primary('Lets Explore 🙌  ');
        return view('recyclingplant.marketplace');
          
    }

    public function bids_detail($bidID)
    {
        //detail page for bids
        
        
          $data = Bid::find($bidID);

          $bids = DB::table('bids')
            ->leftJoin('users', 'bids.recyclingplant_id', '=', 'users.id')
            ->leftJoin('rates', 'bids.rate', '=', 'rates.rateID')
            ->where('bids.bidID', '=', $bidID )
            ->get();

             $stocks = DB::table('inventories')
        ->where ('collectioncenter_id', '=', Auth::id() )
        ->get();


        return view('collectioncenter.marketplace_detail', ['data'=>$data], ['bids'=>$bids, 'stocks'=>$stocks ]);
          
    }
}
