<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminConfiguration;
use App\Models\GetNotified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;
use Yajra\Datatables\Datatables;

class GetNotifiedController extends Controller
{
    public function __construct(GetNotified $model)
    {        
        $this->moduleName = "Get Notified";
        $this->moduleRoute = url('admin/get-notified');
        $this->moduleView = "admin.main.get-notified";
        $this->model = $model;

        View::share('module_name', $this->moduleName);
        View::share('module_route', $this->moduleRoute);
        View::share('moduleView', $this->moduleView);
    }

    public function index()
    {    
        $receive_notification_emails = AdminConfiguration::where('name', 'receive_notification_emails')->first();
        view()->share('isIndexPage', true);    
        return view("$this->moduleView.index", compact('receive_notification_emails'));
    }

    public function getDatatable(Request $request)
    {
        $result = $this->model->select("*");

        return Datatables::of($result)->addIndexColumn()->make(true);        
    }    
    public function show($id)
    {        

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

    public function changeEmailNotificationSettings(Request $request)
    {
        $result = array();
        $result['message'] = "Sorry, Something went wrong please try again!";
        $result['code'] = 400;

        try {              
            $adminConfiguration = AdminConfiguration::where('name', 'receive_notification_emails')->first();        
            if( $adminConfiguration)  {
                $adminConfiguration->value = $request->get('receive_notification_emails');
                $isSaved = $adminConfiguration->save();
                if( $isSaved ) {                                
                    $result['message'] = "Settings changed successfully!";
                    $result['code'] = 200;                        
                }                 
            }    
        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();
            $result['code'] = 400;
            return response()->json($result, $result['code']);
        }

        return response()->json($result, $result['code']);
    }
}
