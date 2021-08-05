<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\City;
use App\Models\State;
use App\Models\Industry;
use App\Models\Testimonial;
use App\Models\Pledge;
use App\Models\Badge;
use App\Models\Organization;
use App\Models\PledgeCompany;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class GreenplaceWorkController extends Controller
{
    public function __construct(Company $model)
    {        
        
        $this->moduleRoute = url('greenplaces-work');
        $this->moduleView = "main.directory";
        $this->model = $model;

        View::share('module_route', $this->moduleRoute);
        View::share('moduleView', $this->moduleView);
    }

    public function index()
    {  
        $testimonials = Testimonial::where('is_featured', '1') 
        ->limit(config('greenplaces.no_of_pledge_display_certify_page'))
        ->get();
        $organizations = Organization::get();//limit(config('greenplaces.no_of_organization_display_home_page'))->
        return view("main.directory",compact('testimonials','organizations'));
    }
    public function getDatatable(Request $request)
    {
        $search = (!empty($_GET["search"])) ? ($_GET["search"]) : ('');
        $city = [];
        $state = [];
        $indusrty = [];
        if($search){
            $result = DB::table('company')
            ->join('city', 'company.city_id', '=', 'city.id')
            ->join('state', 'company.state_id', '=', 'state.id')
            ->join('industry', 'company.industry_id', '=', 'industry.id')
            ->where('company.name', 'like', '%' . $search . '%')
            ->orWhere('company.summery', 'like', '%' . $search . '%')
            ->orWhere('company.weblink', 'like', '%' . $search . '%')
            ->orWhere('company.careerlink', 'like', '%' . $search . '%')
            ->orWhere('company.company_level', 'like', '%' . $search . '%')
            ->orWhere('company.tone_offset', 'like', '%' . $search . '%')
            ->orWhere('city.name', 'like', '%' . $search . '%')
            ->orWhere('state.name', 'like', '%' . $search . '%')
            ->orWhere('industry.name', 'like', '%' . $search . '%')
            ->select('company.*', 'city.name as city_name', 'state.name as state_name', 'industry.name as industry_name');
        }
        else{
        $result = DB::table('company')
                                ->join('city', 'company.city_id', '=', 'city.id')
                                ->join('state', 'company.state_id', '=', 'state.id')
                                ->join('industry', 'company.industry_id', '=', 'industry.id')
                                ->select('company.*', 'city.name as city_name', 'state.name as state_name', 'industry.name as industry_name');
        }
        return Datatables::of($result)
        // ->editColumn('image', function ($result) {
        //     return '<div class="avtar-image"><img src="'.$result->thumb_image_full_path.'" /></div>';
        // })  
        ->setRowAttr([
            'data-url' => function($result) {
                return $this->moduleRoute.'/'.$result->slug;
            },
        ])
        ->setRowClass('clickable-row')
        ->addIndexColumn()
        // ->rawColumns(['image'])
        ->make(true);        
    }
    public function companydetail(Request $request, $company_slug)
    {
        $company = Company::where('slug', $company_slug)->first();
        if( $company ) {      
        $testimonials = Testimonial::where('company_id',$company->id) 
                                    ->get();
          
        $pledges = PledgeCompany::join('pledge','pledge.id','=','pledge_companies.pledge_id')
                            ->join('company','company.id','=','pledge_companies.company_id')
                            ->where('pledge_companies.company_id','=',$company->id)
                            ->get(['pledge.*']);
                            
         return view('main.company-profile',compact('testimonials','company','pledges'));
        }
    } 
    
    public function badgeDetail(Request $request, $company_slug)
    {
        $badge = Badge::where('company_slug', $company_slug)->where('status','0')->first();
        if($badge)
        {
            return view('main.badge', compact('badge'));
        }else{
            return '';
        }
        
    }
}
