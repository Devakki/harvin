<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

use App\Http\GreenPlacesHelpers;
use App\Models\Location;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CoolCliemetController extends Controller
{
    public function index(Request $request)
    {
try {
            $total_offset = 0;
        $offset_value = $request->get('offset_values');

        $company_name =  $offset_value[0]['company_name'];
        $business_sector =  $offset_value[0]['business_id'];
        $business_type =  $offset_value[0]['business_type'];
        $user_name =  $offset_value[0]['user_name'];
        $location =  $offset_value[0]['location'];
        $sq_foot =  $offset_value[0]['sq_foot'];
        $employees =  $offset_value[0]['employee'];
        $total_facilities =  $offset_value[0]['total_facilities'];
        if($business_sector=27)
        {
        $revenueperemployee = 52770;
        }
        else{
            $revenueperemployee = 242424;
        }
        $total_revenue = $employees * $revenueperemployee;
        if(isset($offset_value[0]['carbon_offset']))
        {
            $total_offset = $total_offset + $offset_value[0]['carbon_offset'];
        }
        $array_get_detail = [
            'name' => $user_name,
            'op' => 'get_defaults_and_results',
            'input_location' => '',
            'input_size' => '1',
            'input_income' => '1',
            'input_location_mode' => '5',
            'input_location_b' =>  $location,
            'input_sector' => $business_sector,
            'input_facilities' => $total_facilities,
            'input_employees' => $employees,
            'input_revenue' => $total_revenue,
            'input_square_feet' => $sq_foot
        ];

         $response = Http::get('https://coolclimate.org/calculators/business/api.php', $array_get_detail);

    	$xml = simplexml_load_string($response);

        $json = json_encode($xml);

        $array = json_decode($json,TRUE);


        if($business_type == "software")
        {
            $array['input_footprint_transportation_miles1'] = 0;
            $array['input_proc_money1'] = 1000;
            $array['input_proc_money2'] = 1000;
            $array['input_proc_money19'] = 1000;
            $array['input_proc_money4'] = 500;
            $array['input_proc_money5'] = 500;
            $array['input_proc_money6'] = 500;
        }
        if($business_type == "professional_services")
        {
            $array['input_footprint_transportation_miles1'] = 0;
        }

        $response1 = Http::asForm()->POST('https://coolclimate.org/calculators/business/api.php?op=compute_footprint',$array);

                $xml1 = simplexml_load_string($response1);

            $json1 = json_encode($xml1);

            $array2_result = json_decode($json1,TRUE);


            $total_tone = ($total_offset) + ($array2_result['result_grand_total']) ;

                $details = $offset_value[0];
                $details['locationdetail'] = $this->getLocationdetail($location);
                $details['carbon'] = $total_tone;

                if($this->send_email($details))
                {
                    return $total_tone." tons###".$company_name."’s annual carbon footprint:";
                }
                return GreenPlacesHelpers::apiJsonResponse([] , config("greenplaces.status_codes.normal_error"), 'Sorry, Something went wrong please try again');

            } catch (\Exception $e) {
                return GreenPlacesHelpers::apiJsonResponse([] , config("greenplaces.status_codes.server_side"), $e->getMessage());
            }
    }

    public function sendmail(Request $request)
    {
        $offset_value = $request->get('offset_values');

            $details = $offset_value[0];
            $details['locationdetail'] = (isset($offset_value[0]['location'])) ? $this->getLocationdetail($offset_value[0]['location']) : "other";
                    $this->send_email($details);
                    return true;
    }
    public function send_email($details)
    {
        \Mail::to(config('greenplaces.send_notification_to_admin_email'))->send(new \App\Mail\UserInfo($details));
        return true;
    }
    public function getavanueFromSector($business_sectore)
    {
        $array = ["function" => "getValueFromSector",
        "arg0" => "revenues_per_worker",
        "arg1" => 28];
        $response = Http::asForm()->POST('https://coolclimate.org/calculators/business/model/businessfunctions.php',$array);
        $obj = json_decode($response);
       return $obj->response->revenues_per_worker;
    }

     public function getLocationdetail($location)
    {
        $location = Location::find($location);
        $locationnam =  $location->city.", ".$location->state;
       return $locationnam;
    }


}
