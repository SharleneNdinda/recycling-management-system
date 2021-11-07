<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Deposit;
use App\Models\CollectionCenter;

class AdminController extends Controller
{
    public function reports_view()

    {     
         //get total deposits count
         $deposits = DB::table('deposits')
         ->select('id')
         ->get();
         $deposits_count = $deposits->count();

         //get total collection ceneter count
         $collectioncenters = DB::table('role_user')
         ->where('role_id', '=', 3)
         ->get();
         $collectioncenters_count = $collectioncenters->count();


        flashy()->primary('Wohoo! You got reports!');
        return view('admin.reports', ['deposits'=>$deposits_count, 'collectioncenters'=>$collectioncenters_count]);
        
    }

    public function users_view()
    {
        $users = DB::table('users')
                    ->get();
        flashy()->primary('Wohoo! Lets manage our users!');
        return view('admin.users',  ['users'=>$users]);

    }

      public function approve()
    {
       
        $approvees = DB::table('collection_centers')
        ->Join('users', 'collection_centers.collectioncenter_id', '=', 'users.id')
        ->where('approved_at', '=', null )
        ->get();

        flashy()->primary('Alright! Lets Do Some Management ✏ ');
        return view('admin.approve',  ['approvees'=>$approvees]);

    }
        public function approve_center($user_id)
    {
       
        DB::table('users')->where('id', $user_id)->update(['approved_at' => now()]);  

        
        flashy()->primary('Wohoo! You just approved A Center!');
        return redirect()->route('admin.approve');

    }

   
}
