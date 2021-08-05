<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\GreenPlacesHelpers;
use App\Http\Requests\Admin\TestimonialRequest;
use App\Models\Testimonial;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Yajra\Datatables\Datatables;

class TestimonialController extends Controller
{
    public function __construct(Testimonial $model)
    {        
        $this->moduleName = "Testimonial";
        $this->moduleRoute = url('admin/testimonial');
        $this->moduleView = "admin.main.testimonial";
        $this->model = $model;

        View::share('module_name', $this->moduleName);
        View::share('module_route', $this->moduleRoute);
        View::share('moduleView', $this->moduleView);
    }

    public function index()
    {    
        view()->share('isIndexPage', true);
        return view("$this->moduleView.index");
    }

    public function getDatatable(Request $request)
    {
        $result = $this->model->select("*");
        return Datatables::of($result)
        ->editColumn('image', function ($result) {
            return '<div class="avtar-image"><img src="'.$result->thumb_image_full_path.'" /></div>';
        })     
        ->addIndexColumn()
        ->rawColumns(['image'])
        ->make(true);        
    }
    
    public function create()
    {
        $companies = Company::orderBy('name', 'asc')->get()->pluck("name", "id")->toArray();
        return view("admin.main.general-ajax.create", compact('companies'));
    }
 
    public function store(TestimonialRequest $request)
    {
        $input = $request->except(['_token', 'image']);
        try {         
            if ($request->file('image', false)) {        
                $imageStore = GreenPlacesHelpers::saveUploadedImage($request->file('image'), config("greenplaces.path.doc.testimonial_image"), "", $isCreateThumb="1", $height=null, $width=700, $request->get('cropped_image'));            
                if (isset($imageStore['error_msg']) && $imageStore['error_msg'] == '' && isset($imageStore['name']) && !empty($imageStore['name'])) {
                    $input["image"] = $imageStore['name'];                    
                }                                
            } 
            if(isset($input['in_certify']))
            {
                Testimonial::where('in_certify', '1')
                ->update(['in_certify' => '0']);
            }
            else{
                $input['in_certify'] = "0";
            }
            $isSaved = $this->model->create($input);
            if ($isSaved) {
                return GreenPlacesHelpers::apiJsonResponse([] , config("greenplaces.status_codes.success"),  $this->moduleName . " Created Successfully");  
            }
            return GreenPlacesHelpers::apiJsonResponse([] , config("greenplaces.status_codes.normal_error"), 'Sorry, Something went wrong please try again'); 

        } catch (\Exception $e) {
            return GreenPlacesHelpers::apiJsonResponse([] , config("greenplaces.status_codes.server_side"), $e->getMessage());
        }
    }

    public function show($id)
    {        

    }
    
    public function edit($id)
    {
        $result = $this->model->find($id);
        if ($result) {
            $companies = Company::orderBy('name', 'asc')->get()->pluck("name", "id")->toArray();
            return view("admin.main.general-ajax.edit", compact("result", "companies"));
        }
        return redirect($this->moduleRoute)->with("error", "Sorry, $this->moduleName not found");
    }
   
    public function update(TestimonialRequest $request, $id)
    {                         
        $input = $request->except(['_token', 'image']);           
        try {

            $result = $this->model->find($id);            

            if ($result) {                                          
                if ($request->file('image', false)) {        
                    $imageStore = GreenPlacesHelpers::saveUploadedImage($request->file('image'), config("greenplaces.path.doc.testimonial_image"), $result->image, $isCreateThumb="1", $height=null, $width=700, $request->get('cropped_image'));            
                    if (isset($imageStore['error_msg']) && $imageStore['error_msg'] == '' && isset($imageStore['name']) && !empty($imageStore['name'])) {
                        $input["image"] = $imageStore['name'];                    
                    }                                
                } 
                if( ! $request->get('is_featured', '')  ) {
                    $input["is_featured"] = '0';
                }
                else{
                    $input["is_featured"] = '1'; 
                }
                $isSaved = $result->update($input);
            
                if ($isSaved) {
                    return GreenPlacesHelpers::apiJsonResponse([] , config("greenplaces.status_codes.success"),  $this->moduleName . " Updated Successfully"); 
                }
            }

            return GreenPlacesHelpers::apiJsonResponse([] , config("greenplaces.status_codes.normal_error"), 'Sorry, Something went wrong please try again'); 

        } catch (\Exception $e) {
            return GreenPlacesHelpers::apiJsonResponse([] , config("greenplaces.status_codes.server_side"), $e->getMessage());
        }
    }
  
    public function destroy($id)
    {
        $result = array();
        $data = $this->model->find($id);

        if ($data) {                 
            $res = $data->delete();
            if ($res) {      
                $result['message'] = $this->moduleName . " Deleted.";
                $result['code'] = 200;
            } else {
                $result['message'] = "Error while deleting " . $this->moduleName;
                $result['code'] = 400;
            }
           
        } else {
            $result['message'] = $this->moduleName . " not Found!";
            $result['code'] = 400;
        }
        return response()->json($result, $result['code']);
    }
}
