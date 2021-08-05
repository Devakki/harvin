<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pledge;

class PledgeController extends Controller
{
    //
    public function pledgeDetail(Request $request, $pledge_slug)
    {
        $pledge = Pledge::where('slug', $pledge_slug)->first();
        if($pledge) {      
            return view('main.pledge-inner',compact('pledge'));
        }
    }
}
