<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Statics;
use App\Models\Faq;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function index(Request $request)
    {
        $statics = Statics::all();

        $teams = Team::all();

        $faq = Faq::all();
  
        return view("main.about-us", compact('teams','faq','statics'));
    }
}
