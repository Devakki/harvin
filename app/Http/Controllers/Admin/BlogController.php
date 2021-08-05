<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\GreenPlacesHelpers;
use App\Http\Requests\Admin\BlogRequest;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogHashtag;
use App\Models\Hashtag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function __construct(Blog $model)
    {        
        $this->moduleName = "Blog";
        $this->moduleRoute = url('admin/blog');
        $this->moduleView = "admin.main.blogs";
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
        $categories = BlogCategory::orderBy('name', 'asc')->get()->pluck("name", "id")->toArray();
        $hashtags = Hashtag::orderBy('name', 'asc')->get()->pluck("name", "id")->toArray();
        return view("admin.main.general-ajax.create", compact('categories','hashtags'));
    }
 
    public function store(BlogRequest $request)
    {
        $input = $request->except(['_token', 'image', 'hashtags', 'full_image']);
        try {         
            if ($request->file('image', false)) {        
                $imageStore = GreenPlacesHelpers::saveUploadedImage($request->file('image'), config("greenplaces.path.doc.blog_image"), "", $isCreateThumb="1", $height=null, $width=700, $request->get('cropped_image'));            
                if (isset($imageStore['error_msg']) && $imageStore['error_msg'] == '' && isset($imageStore['name']) && !empty($imageStore['name'])) {
                    $input["image"] = $imageStore['name'];                    
                }                                
            } 
            if ($request->file('full_image', false)) {        
                $imageStore1 = GreenPlacesHelpers::saveUploadedImage($request->file('full_image'), config("greenplaces.path.doc.blog_full_image"), "", $isCreateThumb="1", $height=500, $width=1100, $request->get('cropped_full_image'));            
                if (isset($imageStore1['error_msg']) && $imageStore1['error_msg'] == '' && isset($imageStore1['name']) && !empty($imageStore1['name'])) {
                    $input["full_image"] = $imageStore1['name'];                    
                }                                
            }
            $input['reading_time'] = Str::readDuration($input['long_description']);
            if( ! $request->get('is_popular', '')  ) {
                    $input["is_popular"] = '0';
                }
                else{
                    $input["is_popular"] = '1'; 
                }
                if( ! $request->get('is_slider', '')  ) {
                    $input["is_slider"] = '0';
                }
                else{
                    $input["is_slider"] = '1'; 
                    Blog::where('is_slider', '1')->update(['is_slider' => '0']);
                
                }
            $isSaved = $this->model->create($input);
            if ($isSaved) {

                // insert hashtage entry for blog
                $hashtags_data = [];
                $hashtags = $request->get('hashtags', []);
                if( count($hashtags) ){                    
                    foreach ($hashtags as $hashtag) {
                        if (substr($hashtag, 0, 4) == 'new:')
                        {
                            $tagObj = Hashtag::create(['name' => substr($hashtag, 4)]);
                            $hashtags_data[] = ["blog_id" => $isSaved->id, "hashtag_id" => $tagObj->id];
                        }else{
                            $hashtags_data[] = ["blog_id" => $isSaved->id, "hashtag_id" => $hashtag];
                        }
                    }
                    BlogHashtag::insert($hashtags_data);
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
            $categories = BlogCategory::orderBy('name', 'asc')->get()->pluck("name", "id")->toArray();
            $hashtags = Hashtag::orderBy('name', 'asc')->get()->pluck("name", "id")->toArray();
            return view("admin.main.general-ajax.edit", compact("result", "categories",'hashtags'));
        }
        return redirect($this->moduleRoute)->with("error", "Sorry, $this->moduleName not found");
    }
   
    public function update(BlogRequest $request, $id)
    {         
        // echo "<pre>"                ;print_r($request->get('hashtags', []));die();
        $input = $request->except(['_token', 'image', 'hashtags', 'full_image']);           
        try {

            $result = $this->model->find($id);            

            if ($result) {                                          
                if ($request->file('image', false)) {        
                    $imageStore = GreenPlacesHelpers::saveUploadedImage($request->file('image'), config("greenplaces.path.doc.blog_image"), $result->image, $isCreateThumb="1", $height=null, $width=700, $request->get('cropped_image'));            
                    if (isset($imageStore['error_msg']) && $imageStore['error_msg'] == '' && isset($imageStore['name']) && !empty($imageStore['name'])) {
                        $input["image"] = $imageStore['name'];                    
                    }                                
                } 
                if ($request->file('full_image', false)) {        
                    $imageStore1 = GreenPlacesHelpers::saveUploadedImage($request->file('full_image'), config("greenplaces.path.doc.blog_full_image"), $result->full_image, $isCreateThumb="1", $height=500, $width=1100, $request->get('cropped_full_image'));            
                    if (isset($imageStore1['error_msg']) && $imageStore1['error_msg'] == '' && isset($imageStore1['name']) && !empty($imageStore1['name'])) {
                        $input["full_image"] = $imageStore1['name'];                    
                    }                                
                }
                $input['reading_time'] = Str::readDuration($input['long_description']);
                if( ! $request->get('is_popular', '')  ) {
                    $input["is_popular"] = '0';
                }
                else{
                    $input["is_popular"] = '1'; 
                }
                if( ! $request->get('is_slider', '')  ) {
                    $input["is_slider"] = '0';
                }
                else{
                    $input["is_slider"] = '1'; 
                    Blog::where('is_slider', '1')
                        ->where('id', '!=', $id)
                        ->update(['is_slider' => '0']);
                }
                $isSaved = $result->update($input);
            
                if ($isSaved) {
                    $hashtags_data = [];
                    $hashtags = $request->get('hashtags', []);
                    BlogHashtag::where("blog_id", $result->id)->delete();
                    
                    if( count($hashtags) ){
                        foreach ($hashtags as $hashtag) {
                            if (substr($hashtag, 0, 4) == 'new:')
                            {
                                $tagObj = Hashtag::create(['name' => substr($hashtag, 4)]);
                                $hashtags_data[] = ["blog_id" => $result->id, "hashtag_id" => $tagObj->id];
                            }else{
                                $hashtags_data[] = ["blog_id" => $result->id, "hashtag_id" => $hashtag];
                            }
                        }
                        BlogHashtag::insert($hashtags_data);
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
        BlogHashtag::where("blog_id", $id)->delete();

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

    public function createTag(Request $request)
    {
        print_r($request->all());
    }
}
