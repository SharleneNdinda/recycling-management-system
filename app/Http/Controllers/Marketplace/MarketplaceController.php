<?php

namespace App\Http\Controllers\Marketplace;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class MarketplaceController extends Controller
{
    public function index()

    {

        flashy()->primary('Lets Explore 🙌  ');
        return view('collectioncenter.marketplace');
    }

    public function store(Request $request)
    {
          
    }
}
