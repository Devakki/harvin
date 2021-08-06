<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdminConfiguration;
use App\Models\GetNotified;
use App\Models\Blog;
use App\Models\Location;
use App\Models\BlogCategory;
use App\Models\Organization;
use App\Models\Company;
use App\Models\CredibilityBrand;
use App\Http\Requests\GetNotifiedRequest;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request)
    {

        $credibility_brands = CredibilityBrand::limit(config('greenplaces.no_of_pledge_display_credibility_home_page'))
                                        ->get();

        $organization = Organization::limit(20)
                                        ->get();

        $blogcategory = BlogCategory::limit(20)
                                        ->get();

        return view("main.landing", compact('credibility_brands','organization','blogcategory'));
    }

    public function contactus()
    {
        return view("main.contact");
    }

    public function submitGetNotified(GetNotifiedRequest $request)
    {
        $result = array();
        $result['message'] = "Sorry, Something went wrong please try again!";
        $result['code'] = 400;

        try {
            $input = $request->only(['email']);
            $isSaved = GetNotified::create($input);

            if( $isSaved ) {
                $result['message'] = "Thank you. We will contact you as soon as possible!";
                $result['code'] = 200;
            }
        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();
            $result['code'] = 400;
            return response()->json($result, $result['code']);
        }

        return response()->json($result, $result['code']);
    }

    public function getLocation(Request $request)
    {
        $search = trim($request->qry);
        $response = array();

        if($search != ''){
            $locations = Location::orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->get();

            foreach($locations as $location){
                $response[] = array( "value" => $location->id, "text" => $location->name);
            }
        }

        return response()->json($response);
    }
    public function getblogslug()
    {
        $blog = Blog::where('blog_category_id','=',config('greenplaces.carbon_calculator_id'))->first('slug');
        $url =  url('/blog')."/".$blog->slug;
        return "<a href='$url'>learn more</a>";
    }

    public function getState(Request $request)
    {
        $search = trim($request->qry);
        $response = array();

        if($search != ''){
            $locations = Location::orderby('state','asc')->select('state')->where('state', 'like', '%' .$search . '%')->groupBy('state')->get();

            foreach($locations as $location){
                $response[] = array( "value" => $location->state, "text" => $location->state);
            }
        }

        return response()->json($response);
    }

    public function getCity(Request $request)
    {
        $search = trim($request->qry);
        $response = array();

        if($search != ''){
            $locations = Location::orderby('city','asc')->select('id', 'city')->where('city', 'like', '%' .$search . '%')->where('state', $request->state)->get();
        }else{
            $locations = Location::orderby('city','asc')->select('id', 'city')->where('state', $request->state)->get();
        }

        foreach($locations as $location){
            $response[] = array( "id" => $location->id, "text" => $location->city);
        }

        return response()->json($response);
    }

}
