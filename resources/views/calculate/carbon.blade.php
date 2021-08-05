
<div class="modal fade greenp-calculate-modal-main" id="exampleModalCenter" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="{{ asset('images/close-icon.svg') }}" alt="">
                </button>
            </div>
            <div class="modal-body">
                    <div class="greenplace_step_one">
                        <div class="greenp-calculator-step-header">
                            <h5 class="modal-title">Your carbon footprint calculator</h5>
                            <h6 class="greenp-blog-title-main">Which of these best describes your industry?</h6>
                        </div>
                        <form id="step_one_form">
                            <div class="greenp-calculator-step-wrapper">
                                <div class="greenp-industry-business-block services">
                                    <div>
                                        <label class="radio-box-wrapper">Software
                                            <input type="radio" class="business_service" id="software" checked="checked" name="business_type">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div>
                                        <label class="radio-box-wrapper">Professional Services
                                            <input type="radio" class="business_service" id="professional_service" name="business_type">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div>
                                        <label class="radio-box-wrapper">Retail
                                            <input type="radio" class="business_service" id="retail" name="business_type">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div>
                                        <label class="radio-box-wrapper">eCommerce
                                            <input type="radio" class="business_service" id="ecommerce"  name="business_type">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="greenp-other-option-block">
                                        <label class="radio-box-wrapper">Other
                                            <input type="radio" class="business_service" id="otheroffser" name="business_type">
                                            <span class="checkmark"></span>
                                        </label>
                                        <div class="hosting-service-input other_service">
                                            <input type="text" class="form-control other_business_service" placeholder="Industry" name="other_business_service">
                                        </div>
                                    </div>
                                </div>
                                <!-- <p class="error model-error">Please fill all details </p> -->
                                <div class="greenp-modal-footer">
                                <div class="greenp-next-step-btn-footer">
                                    <div class="greenp-back-and-next-btns greenp-next-btn-block">
                                        <button type="button" class="greenplace-theme-btn next_button_one">Next</button>
                                        <a href="javascript:void(0);" class="skip-question-btn skip_btn_start">Skip question</a> 
                                        <p>If you prefer to reach out to us directly, <a href="javascript:void(0);" class="skip-question-btn skip_btn_contact"> click here</a>.</p>
                                       
                                    </div>
                                </div>
                                <div class="greenp-progress-bar-wrapper">
                                            <div class="greenp-progress-bar-grey">
                                                <div class="greenp-progress-bar-step" style="width: 20%;"></div>
                                            </div>
                                    </div>
                                    <div class="greenp-footer-link-block">
                                            <div class="clearfix">
                                                <div class="coolclimate-logo-img">
                                                    <img src="{{ asset('images/coolclimate-logo.svg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="">
                                                <p>Calculations are fueled by scientific research at UC Berkeley's Cool Climate Project.<div class="blog_slug"></div></p>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="greenplace_step_two">
                        <div class="greenp-calculator-step-header">
                            <h5 class="modal-title">Your carbon footprint calculator</h5>
                            <h6 class="greenp-blog-title-main">Where do you host your servers?</h6>
                        </div>
                        <form id="step_two_form">
                            <div class="greenp-calculator-step-wrapper">
                                <div class="greenp-industry-business-block software_cloud" id="software_cloud">
                                    <div>
                                        <label class="radio-box-wrapper">We host them on-site
                                            <input type="radio" checked="checked" class="hostservice" id="host_site" name="business_host">
                                            <span class="checkmark"></span>
                                        </label>
                                        <div class="greenp-other-option-block no_server">
                                            <h6>Number of servers:</h6>
                                            <div class="hosting-service-input ">
                                                <input type="text" class="form-control" name="host_site_no_server" id="host_site_no_server" placeholder="12345" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="radio-box-wrapper">AWS
                                            <input type="radio" id="aws_cloud" class="cloud" name="business_host">
                                            <span class="checkmark"></span>
                                        </label>
                                        <div class="greenp-other-option-block aws_cloud">
                                            <h6>Average monthly bill (USD):</h6>
                                            <div class="hosting-service-input ">
                                                <input type="text" class="form-control amount" name="aws_cloud_input" id="aws_cloud_input" placeholder="$100" >
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="radio-box-wrapper">Google Cloud
                                            <input type="radio" id="google_cloud" class="cloud" name="business_host">
                                            <span class="checkmark"></span>
                                        </label>
                                        <div class="greenp-other-option-block google_cloud">
                                            <h6>Average monthly bill (USD):</h6>
                                            <div class="hosting-service-input">
                                                <input type="text" class="form-control amount" name="google_cloud_input" id="google_cloud_input" placeholder="$100" >
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="radio-box-wrapper">Microsoft Azure
                                            <input type="radio" id="ms_cloud" class="cloud" name="business_host">
                                            <span class="checkmark"></span>
                                        </label>
                                        <div class="greenp-other-option-block ms_cloud">
                                            <h6>Average monthly bill (USD):</h6>
                                            <div class="hosting-service-input">
                                                <input type="text" class="form-control amount" name="ms_cloud_input" id="ms_cloud_input" placeholder="$100" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="greenp-other-option-block">
                                        <label class="radio-box-wrapper">Other
                                            <input type="radio" id="other_host" class="hostservice" name="business_host">
                                            <span class="checkmark"></span>
                                        </label>
                                        <div class="hosting-service-input other_host_service">
                                            <input type="text" class="form-control amount" name="other_service_charge" id="other_service_charge" placeholder="Monthly Charges" >
                                        </div>
                                    </div>
                                </div>
                                <p class="error model-error">Please fill all details </p>
                                <div class="greenp-modal-footer">
                                        <div class="greenp-next-step-btn-footer">
                                                <div class="greenp-back-and-next-btns back_button">
                                                    <button type="button" class="greenplace-theme-btn greenp-back-btn back_button_two">Back</button>
                                                </div>
                                                <div class="greenp-back-and-next-btns">
                                                    <button type="button" class="greenplace-theme-btn next_button_two">Next</button>
                                                    <a href="javascript:void(0);" class="skip-question-btn skip_btn_two">Skip question</a>
                                                    

                                                </div>
                                        </div>
                                        <div class="greenp-progress-bar-wrapper">
                                                    <div class="greenp-progress-bar-grey">
                                                        <div class="greenp-progress-bar-step" style="width: 70%;"></div>
                                                    </div>
                                        </div>
                                        <div class="greenp-footer-link-block">
                                                    <div class="clearfix">
                                                        <div class="coolclimate-logo-img">
                                                            <img src="{{ asset('images/coolclimate-logo.svg') }}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <p>Calculations are fueled by scientific research at UC Berkeley's Cool Climate Project.<div class="blog_slug"></div></p>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <div>



                    <div class="greenplace_step_three">
                        <div class="greenp-calculator-step-header">
                            <h5 class="modal-title">Your carbon footprint calculator</h5>
                            <h6 class="greenp-blog-title-main">Tell us about your workspace</h6>
                        </div>
                        <form id="step_three_form">
                            <div class="greenp-calculator-step-wrapper">
                                <div class="greenp-industry-business-block facility ">
                                    <!-- <div class="blank_division">
                                            <div class="greenp-other-option-block">
                                                <h6>Square footage:</h6>
                                                <div class="hosting-service-input">
                                                    <input type="text" class="form-control sq_foot" placeholder="12345" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                                                </div>
                                            </div>
                                            <div class="greenp-other-option-block">
                                                <h6>Location1:</h6>
                                                <div class="hosting-service-input">
                                                    <select class="form-control location_id autoCompleteLocation" placeholder="12345">
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                    </div> -->
                                    <div class="facility_section">
                                        <div class="sq_foot_location" id="div_1">
                                            <div class="greenp-other-option-block">
                                                <h6>Square footage:</h6>
                                                <div class="hosting-service-input">
                                                    <input type="text" class="form-control sq_foot" placeholder="12345" name="sq_foot" id="sqfoot_1">
                                                    <p class="text-danger sq_foot_error" style="display:none"> Please enter a value greater than or equal to 1.</p>
                                                </div>
                                            </div>
                                            <div class="greenp-other-option-block">
                                                <h6>State:</h6>
                                                <div class="hosting-service-input">
                                                    <select class="form-control state autoCompleteState" menuIsOpen={true} placeholder="North Carolina" name="state" id="state_1" >
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="greenp-other-option-block cityBlock">
                                                <h6 id="cityLable_1">Select nearest city:</h6>
                                                <div class="hosting-service-input">
                                                    <select class="form-control location_id city autoCompleteCity" name="city" id="city_1">
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="greenp-add-facility-wrapper">
                                        <a href="javascript:void(0);" class="add-facility-btn">Add facility +</a>
                                    </div>
                                </div>
                                
                                <div class="greenp-modal-footer">
                                        <div class="greenp-next-step-btn-footer">
                                                <div class="greenp-back-and-next-btns back_button">
                                                    <button type="button" class="greenplace-theme-btn greenp-back-btn back_button_three">Back</button>
                                                </div>
                                                <div class="greenp-back-and-next-btns">
                                                    <button type="button" class="greenplace-theme-btn next_button_three">Next</button>
                                                    <a href="javascript:void(0);" class="skip-question-btn skip_btn_three">Skip question</a> 
                                                </div>
                                        </div>
                                        <div class="greenp-progress-bar-wrapper">
                                                    <div class="greenp-progress-bar-grey">
                                                        <div class="greenp-progress-bar-step" style="width: 50%;"></div>
                                                    </div>
                                        </div>
                                        <div class="greenp-footer-link-block">
                                                    <div class="clearfix">
                                                        <div class="coolclimate-logo-img">
                                                            <img src="{{ asset('images/coolclimate-logo.svg') }}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <p>Calculations are fueled by scientific research at UC Berkeley's Cool Climate Project.<div class="blog_slug"></div></p>
                                                    </div>
                                        </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="greenplace_step_subthree">
                        <div class="greenp-calculator-step-header">
                            <h5 class="modal-title">Your carbon footprint calculator</h5>
                            <h6 class="greenp-blog-title-main">How many employees do you have?</h6>
                        </div>
                        <form id="step_subthree_form">
                            <div class="greenp-calculator-step-wrapper">
                                <div class="greenp-industry-business-block user_info">
                                    <div class="greenp-other-option-block">
                                        <h6>Number of Employees</h6>
                                        <div class="hosting-service-input">
                                            <input type="text" class="form-control" name="employee" id="employee" placeholder="Number of Employees" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                                        </div>
                                    </div>
                                    
                                </div>
                                <p class="error model-error">Please fill all details </p>
                                <div class="greenp-modal-footer">
                                        <div class="greenp-next-step-btn-footer">
                                                <div class="greenp-back-and-next-btns back_button">
                                                    <button type="button" class="greenplace-theme-btn greenp-back-btn back_button_subthree">Back</button>
                                                </div>
                                                <div class="greenp-back-and-next-btns">
                                                    <button type="button" class="greenplace-theme-btn next_button_subthree">Next</button>
                                                     <a href="javascript:void(0);" class="skip-question-btn skip_btn_one">Skip question</a> 
                                                </div>
                                        
                                        </div>
                                        <div class="greenp-progress-bar-wrapper">
                                                    <div class="greenp-progress-bar-grey">
                                                        <div class="greenp-progress-bar-step" style="width: 35%;"></div>
                                                    </div>
                                        </div>
                                        <div class="greenp-footer-link-block">
                                                    <div class="clearfix">
                                                        <div class="coolclimate-logo-img">
                                                            <img src="{{ asset('images/coolclimate-logo.svg') }}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <p>Calculations are fueled by scientific research at UC Berkeley's Cool Climate Project.<div class="blog_slug"></div></p>
                                                    </div>
                                        </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="greenplace_step_four">
                        <div class="greenp-calculator-step-header">
                            <h5 class="modal-title">Your carbon footprint calculator</h5>
                            <h6 class="greenp-blog-title-main">How can we get in touch with you?</h6>
                        </div>
                        <form id="step_four_form">
                            <div class="greenp-calculator-step-wrapper">
                                <div class="greenp-industry-business-block user_info">
                                    <div class="greenp-other-option-block">
                                        <h6>Your Name</h6>
                                        <div class="hosting-service-input">
                                            <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Jane Smith">
                                        </div>
                                    </div>
                                    <div class="greenp-other-option-block">
                                        <h6>Company</h6>
                                        <div class="hosting-service-input">
                                            <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Acme Crop">
                                        </div>
                                    </div>
                                    <div class="greenp-other-option-block">
                                        <h6>Email</h6>
                                        <div class="hosting-service-input">
                                            <input type="text" class="form-control" name="email_id" id="email_id" placeholder="name@domain.com">
                                        </div>
                                    </div>
                                    <div class="greenp-other-option-block">
                                        <h6>Phone</h6>
                                        <div class="hosting-service-input">
                                            <input type="text" class="form-control" name="mobile_no" id="mobile_no" placeholder="555-555-5555" >
                                        </div>
                                    </div>
                                </div>
                                <p class="error model-error">Please fill all details </p>
                                <div class="greenp-modal-footer">
                                        <div class="greenp-next-step-btn-footer">
                                                <div class="greenp-back-and-next-btns back_button">
                                                    <button type="button" class="greenplace-theme-btn greenp-back-btn back_button_four">Back</button>
                                                </div>
                                                <div class="greenp-back-and-next-btns">
                                                    <button type="button" class="greenplace-theme-btn next_button_four">Finish</button>
                                            
                                                </div>
                                        
                                        </div>
                                        <div class="greenp-progress-bar-wrapper">
                                                    <div class="greenp-progress-bar-grey">
                                                        <div class="greenp-progress-bar-step" style="width: 80%;"></div>
                                                    </div>
                                        </div>
                                        <div class="greenp-footer-link-block">
                                                    <div class="clearfix">
                                                        <div class="coolclimate-logo-img">
                                                            <img src="{{ asset('images/coolclimate-logo.svg') }}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <p>Calculations are fueled by scientific research at UC Berkeley's Cool Climate Project.<div class="blog_slug"></div></p>
                                                    </div>
                                        </div>
                                </div>
                            </div>
                        </form>
                    </div>


                    <div class="greenplace_step_five">
                        <div class="greenp-calculator-step-header">
                            <h5 class="modal-title">Your carbon footprint calculator</h5>
                            <!-- <h6 class="greenp-blog-title-main">First, please tell us what industry you do business in?</h6> -->
                        </div>
                        <div class="greenp-calculator-step-wrapper">
                                    <div class="loading"><p>Processing..</p></div>
                                    <div class="greenp-annual-carbon-wrapper result_tone">
                                        <div class="greenp-annual-box">
                                            <h6 class="greenp-blog-title-main" id="company_detail"></h6>
                                            <span id="carbon_calculate"></span>
                                        </div>
                                        <p class="greenp-paragraph-text">Congratulations! Knowing your footprint is the first step to being a more sustainable business -- please consider doubling your impact by encouraging others to calculate their free carbon footprint too. In the meantime, we’ll reach out to help you become carbon neutral.</p>
                                    </div>
                                <div class="greenp-modal-footer">
                                    <div class="greenp-next-step-btn-footer">
                                        <div class="greenp-back-and-next-btns greenp-next-btn-block">
                                            <a class="twitter customer share greenplace-theme-btn next_button_five" href="https://twitter.com/share?text=I just calculated my business' carbon footprint in under 60 seconds! Visit GreenPlacestoWork.com to get your free carbon footprint @GreenPlacesTeam" title="Twitter share" target="_blank">Share Calculator</a>
                                        </div>
                                        
                                    </div>
                                    <div class="greenp-progress-bar-wrapper">
                                                <div class="greenp-progress-bar-grey">
                                                    <div class="greenp-progress-bar-step" style="width: 100%;"></div>
                                                </div>
                                        </div>
                                        <div class="greenp-footer-link-block">
                                                <div class="clearfix">
                                                    <div class="coolclimate-logo-img">
                                                        <img src="{{ asset('images/coolclimate-logo.svg') }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <p>Calculations are fueled by scientific research at UC Berkeley's Cool Climate Project.<div class="blog_slug"></div></p>
                                                </div>
                                        </div>
                                </div>
                        </div>

                    </div>
           

                    <div class="greenplace_step_for_other">
                        <div class="greenp-calculator-step-header">
                            <h5 class="modal-title">Your carbon footprint calculator</h5>
                            <!-- <h6 class="greenp-blog-title-main">First, please tell us what industry you do business in?</h6> -->
                        </div>
                        <div class="greenp-calculator-step-wrapper">
                                    <div class="greenp-annual-carbon-wrapper result_tone">
                                        <div class="greenp-annual-box">
                                            <h6 class="greenp-blog-title-main">It looks like we’re going to need some more information to calculator your footprint</h6>
                                        </div>
                                        <!-- <p class="greenp-paragraph-text">Thanks, we'll get in touch with you shortly!" and list an email address "Listings@greenplacestowork.com"</p> -->
                                        <p class="greenp-paragraph-text text-center">Thank you! We’ll be in touch shortly to help you reach your sustainability goals</p>
                                    </div>
                                <p class="error model-error">Please fill all details </p> 
                                <div class="greenp-modal-footer">
                                    <div class="greenp-next-step-btn-footer">         
                                        <div class="greenp-back-and-next-btns">
                                           <!-- <button type="button" class="greenplace-theme-btn next_button_five">Cta goes here</button>  -->
                                            <!-- <a class="twitter customer share greenplace-theme-btn next_button_five" href="https://twitter.com/share?text=I just calculated my business' carbon footprint in under 60 seconds! Visit GreenPlacestoWork.com to get your free carbon footprint @GreenPlacesTeam" title="Twitter share" target="_blank">Share Calculator</a> -->
                                        </div>
                                        
                                    </div>
                                    <div class="greenp-progress-bar-wrapper">
                                                <div class="greenp-progress-bar-grey">
                                                    <div class="greenp-progress-bar-step" style="width: 100%;"></div>
                                                </div>
                                        </div>
                                        <div class="greenp-footer-link-block">
                                                <div class="clearfix">
                                                    <div class="coolclimate-logo-img">
                                                        <img src="{{ asset('images/coolclimate-logo.svg') }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <p>Calculations are fueled by scientific research at UC Berkeley's Cool Climate Project.<div class="blog_slug"></div></p>
                                                </div>
                                        </div>
                                </div>
                        </div>

                    </div>
           
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="{{ asset('plugins/cleave/cleave.min.js') }}"></script> 
<script
      async
      src="https://platform.twitter.com/widgets.js"
      charset="utf-8"
    ></script>
<script type="text/javascript">
    function select2Refresh(nextindex) {

        var selecter = '#sqfoot_'+ nextindex; 
        var sqfoot = new Cleave(selecter, {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand',
            noImmediatePrefix: true,
            rawValueTrimPrefix: true,
            numeralPositiveOnly: true
        });
        sqfoot_cleaves[nextindex] = sqfoot;    

        var stateValue = '';
        $('.autoCompleteState').autoComplete({
            resolver: 'custom',
            minLength:2,
            events: {
                search: function (qry, callback) {
                    if(qry.trim().length  < 2)
                    {
                        return false;
                    }
                    // let's do a custom ajax call
                    $.ajax(
                        'get-state',
                        {
                            data: { 'qry': qry}
                        }
                    ).done(function (res) {
                        callback(res);
                    });
                }
            }
        });

        $(".cityBlock").hide();

        $('.autoCompleteState').on('autocomplete.select', function (evt, item) {
            var id = $(this).attr('id');
            var split_id = id.split("_");
            $('#city_'+ split_id[1]).empty().trigger('change');
            if(item)
            {
                stateValue = item.value;
                if(stateValue == 'California')
                {
                    $('#cityLable_'+ split_id[1]).text('Select nearest county:');
                }else{
                    $('#cityLable_'+ split_id[1]).text('Select nearest city:');
                }
                $.ajax(
                    'get-city',
                    {
                        data: { 'state': stateValue}
                    }
                ).done(function (res) {
                    $('#city_'+ split_id[1]).select2({
                        allowClear: true,
                        data: res
                    });
                });
                $(".cityBlock").show();
            }
        });
    }
    $(document).ready(function () {
        $.ajax({
                url: "{{ url('get_carbon_slug') }}",
                type: "GET", 
                success: function(data){ 
                    $('.blog_slug').append(data);    
                },
                error: function (xhr, status, error) {                 
                }
            });
    });
    function checkStepThreeForm()
    {
        // adding rules for inputs with class 'sq_foot'
        $(".sq_foot_location input.sq_foot").each(function () {
            $(this).rules("add", {
                required: true,
                // min: 1,
                messages : { 
                    required : 'Please add square footage' ,
                    digits: 'Please add valid square footage'
                }
            });
        });

        // adding rules for inputs with class 'state'
        $(".sq_foot_location input.state").each(function () {
            $(this).rules("add", {
                required: true,
                messages : { required : 'Please select state' }
            });
        });

        // adding rules for inputs with class 'city'
        $(".sq_foot_location input.city").each(function () {
            $(this).rules("add", {
                required: true,
                messages : { required : 'Please select city' }
            });
        });
    }

    var cleaves = [];
    for(let field of $('.amount').toArray()){
        var cleave = new Cleave(field, {
            numeral: true,
            prefix: '$',
            numeralThousandsGroupStyle: 'thousand',
            noImmediatePrefix: true,
            rawValueTrimPrefix: true,
            numeralPositiveOnly: true
        });
        cleaves.push(cleave);
    }

    var sqfoot_cleaves = [];

    $(document).ready(function () {
        
        select2Refresh(1);

        document.getElementById('mobile_no').addEventListener('input', function (e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
            e.target.value = !x[2] ? x[1] :  x[1] + '-' + x[2] + (x[3] ? '-' + x[3] : '');
        });

        $("#step_one_form").validate({
            ignore: [],
            errorElement: 'p',
            errorClass: 'text-danger',
            normalizer: function( value ) {
                return $.trim( value );
            },
            rules: {                 
                business_type: {
                    required: true
                },
                other_business_service:{
                    required: '#otheroffser:checked'
                }
            },
            messages :{
                business_type: {
                    required: "Please select business type"
                },
                other_business_service:{
                    required: 'Please add industy name'
                }
            },
            errorPlacement: function(error, element) {
                if ( element.attr("id") == "software") {
                    error.appendTo($(element).closest('.services'));                     
                } else {
                    error.insertAfter(element);
                }
            }
        });

        $("#step_two_form").validate({
            ignore: [],
            errorElement: 'p',
            errorClass: 'text-danger',
            normalizer: function( value ) {
                return $.trim( value );
            },
            rules: {                 
                business_host: {
                    required: true
                },
                host_site_no_server:{
                    required: '#host_site:checked',
                    digits: true
                },
                aws_cloud_input:{
                    required: '#aws_cloud:checked',
                    // digits: true
                },
                google_cloud_input:{
                    required: '#google_cloud:checked',
                    // digits: true
                },
                ms_cloud_input:{
                    required: '#ms_cloud:checked',
                    // digits: true
                },
                other_service_charge:{
                    required: '#other_host:checked',
                    // digits: true
                },
            },
            messages: {                 
                business_host: {
                    required: "Please select host server"
                },
                host_site_no_server:{
                    required: 'Please add no of server',
                    digits: "Please add valid number"
                },
                aws_cloud_input:{
                    required: 'Please add charges',
                    digits: "Please add valid charges"
                },
                google_cloud_input:{
                    required: 'Please add charges',
                    digits: "Please add valid charges"
                },
                ms_cloud_input:{
                    required: 'Please add charges',
                    digits: "Please add valid charges"
                },
                other_service_charge:{
                    required: 'Please add charges',
                    digits: "Please add valid charges"
                },
            },
            errorPlacement: function(error, element) {
                if ( element.attr("id") == "host_site") {
                    error.appendTo($(element).closest('.software_cloud'));                     
                } else {
                    error.insertAfter(element);
                }
            }
        });

        $("#step_three_form").validate({
            ignore: [],
            errorElement: 'p',
            errorClass: 'text-danger',
            normalizer: function( value ) {
                return $.trim( value );
            },
            rules: {                 
                sq_foot: {
                    required: true
                },
                // location:{
                //     required: true,
                // }
            }
        });
    $("#step_subthree_form").validate({
            ignore: [],
            errorElement: 'p',
            errorClass: 'text-danger',
            normalizer: function( value ) {
                return $.trim( value );
            },
            rules: {                 
                employee: {
                    required: true,
                    digits: true
                },
                // location:{
                //     required: true,
                // }
            },
            messages:{
                employee: {
                    required: 'Please enter no of employee',
                    digits: 'Please add valid number',
                },
            }
        });

        $("#step_four_form").validate({
            ignore: [],
            errorElement: 'p',
            errorClass: 'text-danger',
            normalizer: function( value ) {
                return $.trim( value );
            },
            rules: {                 
                user_name: {
                    required: true,
                },
                company_name:{
                    required: true,
                },
                email_id:{
                    required: true,
                    email: true
                },
                mobile_no:{
                    required: true,
                    // digits: true,
                    // maxlength:10,
                    // minlength:10,
                },
            },
            messages: { 
                user_name: {
                    required: 'Please add your name',
                },
                company_name:{
                    required: 'Please add company name',
                },
                email_id:{
                    required: 'Please add email',
                    email: 'Please add valid email'
                },
                mobile_no:{
                    required: 'Please add phone no ',
                    digits: 'Please add valid phone no ',
                    maxlength: 'phone no must be 10 digit',
                    minlength: 'phone no must be 10 digit',
                },
            }
        });
        
    });
    (function($){
  
  
  $.fn.customerPopup = function (e, intWidth, intHeight, blnResize) {
    
    
    e.preventDefault();
    
   
    intWidth = intWidth || '1000';
    intHeight = intHeight || '1000';
    strResize = (blnResize ? 'yes' : 'no');

   
    var strTitle = ((typeof this.attr('title') !== 'undefined') ? this.attr('title') : 'Social Share'),
        strParam = 'width=' + intWidth + ',height=' + intHeight + ',resizable=' + strResize,            
        objWindow = window.open(this.attr('href'), strTitle, strParam).focus();
        
  }
 
  $(document).ready(function ($) {
    $('.customer.share').on("click", function(e) {
      $(this).customerPopup(e);
      window.location.reload();
    });
  });
    
}(jQuery));
</script>
@endpush