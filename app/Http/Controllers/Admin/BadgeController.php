<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\GreenPlacesHelpers;
use App\Http\Requests\Admin\BadgeRequest;
use App\Models\Badge;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Yajra\Datatables\Datatables;

class BadgeController extends Controller
{
    public function __construct(Badge $model)
    {        
        $this->moduleName = "Badge";
        $this->moduleRoute = url('admin/badge');
        $this->moduleView = "admin.main.badge";
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
        ->editColumn('snipet', function ($result) {
          return '<textarea class="badge_snippet"><iframe frameborder="0" allowfullscreen
      style="width: 150px;height: 150px;" src="'.url('badgecode/'.$result->company_slug). '" title="Greenplace"></iframe></textarea>';
        })
        ->rawColumns(['image','snipet'])
        ->make(true);        
    }
    
    public function create()
    {
        $companies = Company::orderBy('name', 'asc')->get()->pluck("name", "slug")->toArray();
        return view("admin.main.general-ajax.create", compact('companies'));
    }
 
    public function store(BadgeRequest $request)
    {
        $input = $request->except(['_token', 'image']);
        try {         
            if ($request->file('image', false)) {        
                $imageStore = GreenPlacesHelpers::saveUploadedImage($request->file('image'), config("greenplaces.path.doc.badge_image"), "", $isCreateThumb="1", $height=null, $width=700, $request->get('cropped_image'));            
                if (isset($imageStore['error_msg']) && $imageStore['error_msg'] == '' && isset($imageStore['name']) && !empty($imageStore['name'])) {
                    $input["image"] = $imageStore['name'];                    
                }                                
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
            $companies = Company::orderBy('name', 'asc')->get()->pluck("name", "slug")->toArray();
            return view("admin.main.general-ajax.edit", compact("result", "companies"));
        }
        return redirect($this->moduleRoute)->with("error", "Sorry, $this->moduleName not found");
    }
   
    public function update(BadgeRequest $request, $id)
    {                         
        $input = $request->except(['_token', 'image']);           
        try {

            $result = $this->model->find($id);            

            if ($result) {                                          
                if ($request->file('image', false)) {        
                    $imageStore = GreenPlacesHelpers::saveUploadedImage($request->file('image'), config("greenplaces.path.doc.badge_image"), $result->image, $isCreateThumb="1", $height=null, $width=700, $request->get('cropped_image'));            
                    if (isset($imageStore['error_msg']) && $imageStore['error_msg'] == '' && isset($imageStore['name']) && !empty($imageStore['name'])) {
                        $input["image"] = $imageStore['name'];                    
                    }                                
                } 
                if( ! $request->get('status', '')  ) {
                    $input["status"] = '0';
                }
                else{
                    $input["status"] = '1'; 
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
