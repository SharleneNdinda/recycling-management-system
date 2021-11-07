<?php

namespace App\Http\Controllers\Deposit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Deposit;
class DepositController extends Controller
{
    public function index()

    {
        // this query joins role_user and users 
         $users = DB::table('role_user')
            ->leftJoin('users', 'role_user.user_id', '=', 'users.id')
            ->where('role_id', '=', 2)
            ->get();

        // count deposits made by currently logged in collection center
        $deposits = DB::table('deposits')
        ->where ('collectioncenter_id', '=', Auth::id() )
        ->get();

        $deposits_count = $deposits->count();
        
        
        flashy()->primary('Lets Make a Deposit 🙌 ');
        return view('collectioncenter.deposit', ['users'=>$users, 'deposits_count'=>$deposits_count]);
    }

    public function store(Request $request)
    {
          $this->validate($request, [
             
            'consumer'=> 'required ',
            'amount'=> 'required ',
            'collectioncenter_id'=> 'required ',
          ]);

        $deposit = new Deposit(); 
        $deposit->consumer_id = request('consumer');
        $deposit->amount = request('amount');
        $deposit->collectioncenter_id = request('collectioncenter_id');
        $deposit->save();   
        flashy()->primary('Wohoo! New Deposit!');

        return redirect()->route('deposit.view');
    }

     public function approval()

    {   
        flashy()->primary('Oh No! Not Approved Yet?');

        return view('collectioncenter.approval');

    }
}
