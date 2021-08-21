<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Pledge;
use App\Models\Testimonial;

class CertifyController extends Controller
{
    public function index(Request $request)
    {
        $pledges = Pledge::get();


        return view("main.why-certify", compact('pledges','testimonial'));
    }
}
