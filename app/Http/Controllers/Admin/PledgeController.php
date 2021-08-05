<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\GreenPlacesHelpers;
use App\Http\Requests\Admin\PledgeRequest;
use App\Models\Pledge;
use App\Models\Company;
use App\Models\PledgeCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;

class PledgeController extends Controller
{
    public function __construct(Pledge $model)
    {        
        $this->moduleName = "Pledge";
        $this->moduleRoute = url('admin/pledge');
        $this->moduleView = "admin.main.pledge";
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
 
    public function store(PledgeRequest $request)
    {
        $input = $request->except(['_token', 'image', 'companies', 'full_image']);
        try {         
            if ($request->file('image', false)) {        
                $imageStore = GreenPlacesHelpers::saveUploadedImage($request->file('image'), config("greenplaces.path.doc.pledge_image"), "", $isCreateThumb="1", $height=null, $width=700, $request->get('cropped_image'));            
                if (isset($imageStore['error_msg']) && $imageStore['error_msg'] == '' && isset($imageStore['name']) && !empty($imageStore['name'])) {
                    $input["image"] = $imageStore['name'];                    
                }                                
            } 
            if ($request->file('full_image', false)) {        
                $imageStore1 = GreenPlacesHelpers::saveUploadedImage($request->file('full_image'), config("greenplaces.path.doc.pledge_full_image"), "", $isCreateThumb="1", $height=500, $width=1100, $request->get('cropped_full_image'));            
                if (isset($imageStore1['error_msg']) && $imageStore1['error_msg'] == '' && isset($imageStore1['name']) && !empty($imageStore1['name'])) {
                    $input["full_image"] = $imageStore1['name'];                    
                }                                
            }
            $input['reading_time'] = Str::readDuration($input['long_description']);
            if( ! $request->get('is_featured', '')  ) {
                $input["is_featured"] = '0';
            }
            else{
                $input["is_featured"] = '1'; 
            }
            $isSaved = $this->model->create($input);
            if ($isSaved) {

                $company_data = [];
                $companies = $request->get('companies', []);
                if( count($companies) ) {                    
                    foreach ($companies as $company) {
                        $company_data[] = ["pledge_id" => $isSaved->id, "company_id" => $company];
                    }
                    PledgeCompany::insert($company_data);
                }

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
   
    public function update(PledgeRequest $request, $id)
    {                         
        $input = $request->except(['_token', 'image', 'companies', 'full_image']);           
        try {

            $result = $this->model->find($id);            

            if ($result) {                                          
                if ($request->file('image', false)) {        
                    $imageStore = GreenPlacesHelpers::saveUploadedImage($request->file('image'), config("greenplaces.path.doc.pledge_image"), $result->image, $isCreateThumb="1", $height=null, $width=700, $request->get('cropped_image'));            
                    if (isset($imageStore['error_msg']) && $imageStore['error_msg'] == '' && isset($imageStore['name']) && !empty($imageStore['name'])) {
                        $input["image"] = $imageStore['name'];                    
                    }                                
                } 
                if ($request->file('full_image', false)) {        
                    $imageStore1 = GreenPlacesHelpers::saveUploadedImage($request->file('full_image'), config("greenplaces.path.doc.pledge_full_image"), $result->full_image, $isCreateThumb="1", $height=500, $width=1100, $request->get('cropped_full_image'));            
                    if (isset($imageStore1['error_msg']) && $imageStore1['error_msg'] == '' && isset($imageStore1['name']) && !empty($imageStore1['name'])) {
                        $input["full_image"] = $imageStore1['name'];                    
                    }                                
                }
                $input['reading_time'] = Str::readDuration($input['long_description']);
                if( ! $request->get('is_featured', '')  ) {
                    $input["is_featured"] = '0';
                }
                else{
                    $input["is_featured"] = '1'; 
                }
                $isSaved = $result->update($input);
            
                if ($isSaved) {

                    $company_data = [];
                    $companies = $request->get('companies', []);
                    PledgeCompany::where("pledge_id", $result->id)->delete();
                    if( count($companies) ) {                        
                        foreach ($companies as $company) {
                            $company_data[] = ["pledge_id" => $result->id, "company_id" => $company];
                        }
                        PledgeCompany::insert($company_data);
                    }
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
