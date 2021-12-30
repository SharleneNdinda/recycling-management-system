<?php

namespace App\Http\Controllers\Offer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Offer;
use App\Models\Rate;
use Illuminate\Database\QueryException;

class OfferController extends Controller
{

    public function offer_create(Request $request)
    {
            $this->validate($request, [
              
            'quantity'=> 'required ',
            'bid_id'=> 'required ',
            'description'=> 'required ',
            'collectioncenter_id'=> 'required ',
          ]);
             if ( request('quantity') <= request('stock')) {
                  $offer = new Offer();
                  $offer->quantity = request('quantity');
                  $offer->bid_id = request('bid_id');
                  $offer->offer_description = request('description');
                  $offer->collectioncenter_id = request('collectioncenter_id');
                  $offer->save();
                  
                  return  back()->with('message', 'Success! Your Offer Has Been Sent');

             } 

             else {
                        return back()->with('message', 'Sorry! You cannot exceed your inventory');
                  }
          
    }
    public function recycling_plant_offers(Request $request)
    {

          $offers = DB::table('offers')
            ->leftJoin('bids', 'offers.bid_id', '=', 'bids.bidID')
            ->leftJoin('users', 'users.id', '=', 'bids.recyclingplant_id')
            ->where ('bids.recyclingplant_id', '=', Auth::id() )
            ->where ('offers.accepted', '!=', 1 )
            ->get();
        flashy()->primary('Wohoo, Lets check todays offers');
          
          return view('recyclingplant.offers', ['offers'=>$offers]);
    }

       public function collectioncenter_offers(Request $request)
    {

          $offers = DB::table('offers')
            ->leftJoin('bids', 'offers.bid_id', '=', 'bids.bidID')
            ->where ('offers.collectioncenter_id', '=', Auth::id() )
            ->where ('offers.accepted', '=', null )
             ->orderBy('offers.created_at', 'desc')
            ->limit(3)
            ->get();

             $accepted_offers = DB::table('offers')
            ->leftJoin('bids', 'offers.bid_id', '=', 'bids.bidID')
            ->where ('offers.collectioncenter_id', '=', Auth::id() )
            ->where ('offers.accepted', '=', 1 )
            ->get();


          flashy()->primary('Wohoo, Lets check todays offers');
          
          return view('collectioncenter.offers', ['offers'=>$offers, 'accepted_offers'=>$accepted_offers]);
    }
}
