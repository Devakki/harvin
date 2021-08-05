# greenplaces

for database :
run php artisan migration

carbon calculator > location database :
php artisan db:seed --class=LocationsSeeder
php artisan db:seed --class=BlogCategorySeeder

config:greenplaces > carbon_calculator_id : 5
config:greenplaces > why_certify : 4
config:greenplaces > artical : 3

## Carbon Calculator 

> ###### First of all we need following values for calculating carbon
    1. business type / business sector
    2. employees
    3. business sq_feet area
    4. location (note:there is 356 location and its id. we can calculate only for those locations)
    5. business services
    
## Files for carbon calculare
1. resources > calculate > carbon.blade
2. public > custom > carboncalculator.js
3. app > http > controllers > CoolCliemetController.php

1. ###### resources > calculate > carbon.blade
    in this file we have set design for carbon calcultor steps to get detail about business. 
    we are doing same thing in all steps like detail are storing in carbon object
    carbon object detail : business_id, business_type, user_name, location, sq_foot, employee, total_facilities.
    All detail will be store in ###offset_values.

2.  ###### public > custom > carboncalculator.js
    in this file there is all type of validation and jquery process basis on skip button, next button and customization on business type what will be show and hide things. and store form data to array and get result.

    for calculating carbon we are divide in 2 type
    1. ###### software, retail and professional services


         $.ajax({
                url: "calculate",
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    offset_values,
                },
                success: function (data) {
                    var res = data.split("###");
                    $(".loading").hide();
                    $(".greenp-annual-carbon-wrapper").show();
                    $("#carbon_calculate").html(res[0]);
                    $("#company_detail").html(res[1]);
                },
                error: function (xhr, desc, err) {
                    fnToastError(err);
                    console.debug(xhr);
                    console.log("Desc: " + desc + "\nErr:" + err);
                    windows.location.reload();
                },
            });

    2. ###### other and eccomerce 
   
    $.ajax({
                url: "sendmail",
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    offset_values,
                },
                success: function (data) {
                    $("#carbon_calculate").html(data);
                    $(".greenplace_step_for_other").show();
                    $(".greenplace_step_four").hide();
                },


3. ###### CoolCliemetController.php
    in this file we got offset_values.
    ###### first step
    
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
   
  
     note : second step in this api we are parsing get data from offset values. 
    ###### Second Step 

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
    

    ###### Third Step 
     note : Third step in this api we are customizating for software and professional service and call post api to get total carbon offset for that.
     
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


    ###### Forth Step 
    in this step we are adding extra carbon and calculating carbon 
    

            $total_tone = ($total_offset) + ($array2_result['result_grand_total']) ;

                $details = $offset_value[0];
                $details['locationdetail'] = $this->getLocationdetail($location);
                $details['carbon'] = $total_tone;

 

# Definition
Carbon calulator parcing same from this 
https://coolclimate.org/calculators/business/ui.php

we are customizing in software and professional services. in greenplaces we are using only 2 service Retail and professional service. so we set employee ravanue basis on this revenueperemployee for retail 242424 and for professional service 52770.




