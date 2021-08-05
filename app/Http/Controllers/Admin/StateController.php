<?php

namespace App\Http\Controllers\Admin;
use App\Http\GreenPlacesHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StateRequest;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class StateController extends Controller
{
    public function __construct(State $model)
    {        
        $this->moduleName = "State";
        $this->moduleRoute = url('admin/state');
        $this->moduleView = "admin.main.state";
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
        ->addIndexColumn()
        ->make(true);
    }
    
    public function create()
    {
        return view("admin.main.general.create");
    }
 
    public function store(StateRequest $request)
    {
        $input = $request->except(['_token']);
        try {     
            $isSaved = $this->model->create($input);
            if ($isSaved) {
                return redirect($this->moduleRoute)->with("success", $this->moduleName . " Created Successfully");
            }
            return redirect($this->moduleRoute)->with("error", "Sorry, Something went wrong please try again");

        } catch (\Exception $e) {
            return redirect($this->moduleRoute)->with('error', $e->getMessage());
        }

    }

    public function show($id)
    {        

    }
    
    public function edit($id)
    {
        $result = $this->model->find($id);
        if ($result) {
            return view("admin.main.general.edit", compact("result"));
        }
        return redirect($this->moduleRoute)->with("error", "Sorry, $this->moduleName not found");
    }
   
    public function update(StateRequest $request, $id)
    {                       
        $input = $request->except(['_token']);
        try {
            $result = $this->model->find($id);            

            if ($result) {                                          

                $isSaved = $result->update($input);
            
                if ($isSaved) {
                    return redirect($this->moduleRoute)->with("success", $this->moduleName . " Updated Successfully");
                }
            }

            return redirect($this->moduleRoute)->with("error", "Sorry, Something went wrong please try again");

        } catch (\Exception $e) {            
            return redirect($this->moduleRoute)->with('error', $e->getMessage());
        }
    }
    
   
  
    public function destroy($id)
    {
        /*$result = array();

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
        return response()->json($result, $result['code']);*/
    }
}
