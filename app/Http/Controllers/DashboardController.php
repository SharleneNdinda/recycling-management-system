<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function index()

    {
        if(Auth::user()->hasRole('consumer'))
        {
            return view('consumer.dashboard');
        }
        elseif(Auth::user()->hasRole('collectioncenter'))
        {
            return view('collectioncenter.dashboard');
        }
        elseif (Auth::user()->hasRole('recyclingplant')) {
            return view('recyclingplant.dashboard');
        }
        elseif (Auth::user()->hasRole('administrator')) {
            return view('admin.dashboard');
            
        }
    }

    public function profile()
    {
        return view('consumer.profile');
    }
}
