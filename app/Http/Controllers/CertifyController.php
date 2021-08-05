<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Testimonial;

class CertifyController extends Controller
{
    public function index(Request $request)
    {
        $pledges = Blog::where('blog_category_id','=',config('greenplaces.why_certify'))
                                // ->limit(config('greenplaces.no_of_pledge_display_certify_page'))
                                ->get();
    
        $testimonial = Testimonial::where('in_certify', '1') 
                               ->first();
        
        return view("main.why-certify", compact('pledges','testimonial'));
    }
}
