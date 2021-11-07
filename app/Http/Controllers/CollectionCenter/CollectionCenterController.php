<?php

namespace App\Http\Controllers\CollectionCenter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\CollectionCenter;
use Illuminate\Database\QueryException;


class CollectionCenterController extends Controller
{
    
    public function profile_view(Request $request)
    {
        flashy()->primary('Ensure Your Info Is Updated 😇 ');
        return view('collectioncenter.profile');
        
    }
    public function details_create(Request $request)

    {
         $this->validate($request, [
             
            'business_number'=> 'required ',
            'location'=> 'required ',
            'collectioncenter_id'=> 'required ',
          ]);
    // implemented try catch on constraint violation 
    try
    {
        $profile = new CollectionCenter(); 
        $profile->business_number = request('business_number');
        $profile->location = request('location');
        $profile->collectioncenter_id = request('collectioncenter_id');
        $profile->save();  

         } catch(QueryException $e) {


         if ($e->getCode() === '23000') { // integrity constraint violation
                   return back()->with('message', 'Sorry! You can only update your details');
         }
    }

        flashy()->primary('Wohoo! We got your details!');
        return redirect()->route('profile.view');

    }

}
