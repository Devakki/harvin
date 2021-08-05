$(document).ready(function () {
    var carbon = {},
        offset_values = [];
    var xBlankRow = $(".blank_division").html();
    var loc = {},
        location = [];
    var sq_foot = 0;

    $(".model-error").hide();
    $(".greenplace_step_two").hide();
    $(".blank_division").hide();
    $(".greenplace_step_three").hide();
    $(".greenplace_step_subthree").hide();
    $(".greenplace_step_four").hide();
    $(".greenplace_step_five").hide();
    $(".greenplace_step_for_other").hide();
    $(".other_service").hide();
    // $(".no_server").hide();
    $(".aws_cloud").hide();
    $(".google_cloud").hide();
    $(".ms_cloud").hide();
    $(".other_host_service").hide();

    $('#step_one_form input[type="radio"]').click(function () {
        $(this).attr("id") == "otheroffser"
            ? $(".other_service").show()
            : $(".other_service").hide();
    });

    $('#step_two_form input[type="radio"]').click(function () {
        $(this).attr("id") == "host_site"
            ? $(".no_server").show()
            : $(".no_server").hide();
        $(this).attr("id") == "other_host"
            ? $(".other_host_service").show()
            : $(".other_host_service").hide();
        $(this).attr("id") == "aws_cloud"
            ? $(".aws_cloud").show()
            : $(".aws_cloud").hide();
        $(this).attr("id") == "google_cloud"
            ? $(".google_cloud").show()
            : $(".google_cloud").hide();
        $(this).attr("id") == "ms_cloud"
            ? $(".ms_cloud").show()
            : $(".ms_cloud").hide();
    });

    $(".next_button_one").click(function () {
        if (!$("#step_one_form").valid()) {
            return false;
        }

        if (document.getElementById("software").checked) {
            carbon.business_type = "software";
            carbon.business_id = "28";

            $(".greenplace_step_subthree").show();
            $(".greenplace_step_one").hide();
        } else if (document.getElementById("professional_service").checked) {
            carbon.business_type = "professional_service";
            carbon.business_id = "28";

            $(".greenplace_step_subthree").show();
            $(".greenplace_step_one").hide();
        } else if (document.getElementById("retail").checked) {
            carbon.business_type = "retail";
            carbon.business_id = "27";

            $(".greenplace_step_subthree").show();
            $(".greenplace_step_one").hide();
        } else if (document.getElementById("ecommerce").checked) {
            carbon.business_type = "ecommerce";
            carbon.other_business_sector = "ecommerce";
            $(".greenplace_step_four").show();
            $(".greenplace_step_one").hide();
        } else {
            var other_business_sector = $(
                ".other_service input[type='text']"
            ).val();

            if (other_business_sector == "") {
                $(".greenplace_step_one .model-error").show();
                return false;
            }

            carbon.business_type = "other";
            carbon.other_business_sector = other_business_sector;
            $(".greenplace_step_four").show();
            $(".greenplace_step_one").hide();
        }
    });
    $(".next_button_two").click(function () {
        var hostSelected = $(
            ".greenplace_step_two input[type='radio']:checked"
        );

        if (!$("#step_two_form").valid()) {
            return false;
        }

        var hostCharges = "";
        var hostType = "";
        if (hostSelected.attr("id") == "host_site") {
            carbon.sub_software_service = "Hosting server";
            hostCharges = $("#host_site_no_server").val();
            hostType = "hostservice";
        } else if (hostSelected.attr("id") == "aws_cloud") {
            hostType = "cloud";
            for (let cleave of cleaves) {
                if (cleave.element.id == "aws_cloud_input") {
                    carbon.sub_software_service = "AWS cloud";
                    hostCharges = cleave.getRawValue();
                    break;
                }
            }
            // hostCharges = $("#aws_cloud_input").val();
        } else if (hostSelected.attr("id") == "google_cloud") {
            hostType = "cloud";
            for (let cleave of cleaves) {
                if (cleave.element.id == "google_cloud_input") {
                    carbon.sub_software_service = "google cloud";
                    hostCharges = cleave.getRawValue();
                    break;
                }
            }
            // hostCharges = $("#google_cloud_input").val();
        } else if (hostSelected.attr("id") == "ms_cloud") {
            hostType = "cloud";
            for (let cleave of cleaves) {
                if (cleave.element.id == "ms_cloud_input") {
                    carbon.sub_software_service = "ms cloud";
                    hostCharges = cleave.getRawValue();
                    break;
                }
            }
            // hostCharges = $("#ms_cloud_input").val();
        } else {
            hostType = "hostservice";
            for (let cleave of cleaves) {
                if (cleave.element.id == "other_service_charge") {
                    carbon.sub_software_service = "Other Service Charge";
                    hostCharges = cleave.getRawValue();
                    break;
                }
            }
            // hostCharges = $("#other_service_charge").val();
        }
        // console.log(hostCharges);
        hostCharges = parseFloat(hostCharges).toFixed(2);

        if (hostType == "hostservice") {
            carbon.sub_business_service = "software";
            carbon.carbon_offset = hostCharges;
            $(".greenplace_step_two").show();
            $(".greenplace_step_one").hide();
        }
        if (hostType == "cloud") {
            carbon.sub_business_service = "cloud";
            carbon.carbon_offset = hostCharges / 10000;
            $(".greenplace_step_two").show();
            $(".greenplace_step_one").hide();
        }
        $(".greenplace_step_four").show();
        $(".greenplace_step_two").hide();
    });

    $(".skip_btn_contact").click(function () {
        carbon.skip_btn = "skip";
        $(".greenplace_step_four").show();
        $(".greenplace_step_one").hide();
    });

    $(".skip_btn_one").click(function () {
        carbon.employee = 0;

        $(".greenplace_step_three").show();
        $(".greenplace_step_subthree").hide();
    });
    $(".skip_btn_start").click(function () {
        carbon.other_business_sector = "other";
        carbon.skip_btn = "skip";
        $(".greenplace_step_subthree").show();
        $(".greenplace_step_one").hide();
    });
    $(".skip_btn_two").click(function () {
        $(".greenplace_step_four").show();
        $(".greenplace_step_two").hide();
    });
    $(".skip_btn_three").click(function () {
        carbon.skip_btn = "skip";
        carbon.other_business_sector = carbon.business_type;
        $(".greenplace_step_two").show();
        $(".greenplace_step_three").hide();
    });

    $(".next_button_three").click(function () {
        checkStepThreeForm();
        if (!$("#step_three_form").valid() || $(".sq_foot:last").val() == 0) {
            if (
                $(".sq_foot:last").val() == 0 &&
                $(".sq_foot:last").val().length > 0
            ) {
                $(".sq_foot_error:last").text(
                    "Please enter a value greater than or equal to 1."
                );
                $(".sq_foot_error:last").show();
                return false;
            } else {
                $(".sq_foot_error:last").hide();
            }
            return false;
        }

        var maxFootIndex = 0;
        var maxFootValue = 0;
        var footValueParse = 0;
        var sq_foot = 0;
        $(".sq_foot").each(function (i, obj) {
            footValueParse = Number(removeCommas($(obj).val()));
            sq_foot += footValueParse * 1;
            if (footValueParse > maxFootValue) {
                maxFootValue = footValueParse;
                maxFootIndex = i + 1;
            }
        });
        // console.log(sq_foot);

        function removeCommas(str) {
            while (str.search(",") >= 0) {
                str = (str + "").replace(",", "");
            }
            return str;
        }

        var location_id = $("#city_" + maxFootIndex).val();

        var total_element = $(".sq_foot_location").length;
        carbon.total_facilities = total_element;
        carbon.sq_foot = sq_foot;
        carbon.location = location_id;

        if (carbon.business_type == "software") {
            $(".greenplace_step_two").show();
        } else {
            $(".greenplace_step_four").show();
        }
        $(".greenplace_step_three").hide();
    });

    $(".next_button_subthree").click(function () {
        if (!$("#step_subthree_form").valid()) {
            return false;
        }

        carbon.employee = $("#employee").val();

        $(".greenplace_step_three").show();
        $(".greenplace_step_subthree").hide();
    });

    $("body").on("click", ".add-facility-btn", function () {
        checkStepThreeForm();
        if (!$("#step_three_form").valid() || $(".sq_foot:last").val() == 0) {
            if (
                $(".sq_foot:last").val() == 0 &&
                $(".sq_foot:last").val().length > 0
            ) {
                $(".sq_foot_error:last").text(
                    "Please enter a value greater than or equal to 1."
                );
                $(".sq_foot_error:last").show();
                return false;
            } else {
                $(".sq_foot_error:last").hide();
            }
            return false;
        }

        var lastid = $(".sq_foot_location:last").attr("id");
        var split_id = lastid.split("_");
        var nextindex = Number(split_id[1]) + 1;
        $(".sq_foot_location:last").after(
            "<div class='sq_foot_location' id='div_" + nextindex + "'></div>"
        );
        xBlankRow =
            `
        <div class="greenp-other-option-block">
            <h6>Square footage:</h6>
            <div class="hosting-service-input">
                <input type="text" class="form-control sq_foot" placeholder="12345" name="sq_foot` +
            nextindex +
            `" id="sqfoot_` +
            nextindex +
            `">
            <p class="text-danger sq_foot_error" style="display:none"> Please enter a value greater than or equal to 1.</p>
            </div>
        </div>
        <div class="greenp-other-option-block">
            <h6>State:</h6>
            <div class="hosting-service-input">
                <select class="form-control state autoCompleteState" placeholder="North Carolina" name="state` +
            nextindex +
            `" id="state_` +
            nextindex +
            `">
                </select>
            </div>
        </div>
        <div class="greenp-other-option-block cityBlock">
            <h6 id="cityLable_` +
            nextindex +
            `">Select nearest city:</h6>
            <div class="hosting-service-input">
                <select class="form-control city autoCompleteCity" name="city` +
            nextindex +
            `" id="city_` +
            nextindex +
            `">
                </select>
            </div>
        </div>
        `;
        $("#div_" + nextindex).append(xBlankRow);
        if (nextindex > 1) {
            $(".greenplace_step_three .greenp-blog-title-main").html(
                "Facility #" + nextindex
            );
        }

        var hideindex = nextindex - 1;
        $("#div_" + hideindex).hide();
        select2Refresh(nextindex);
    });
    $("body").on("blur", ".sq_foot", function () {
        loc.sq_foot = $(this).val();
    });
    $("body").on("blur", ".location_id", function () {
        loc.location_id = $(this).find(":selected").val();
    });

    function validateEmail(email) {
        const re =
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    $(".next_button_four").click(function () {
        if (!$("#step_four_form").valid()) {
            return false;
        }

        carbon.user_name = $("#user_name").val();
        carbon.company_name = $("#company_name").val();
        carbon.email_id = $("#email_id").val();
        carbon.mobile_no = $("#mobile_no").val();
        offset_values.push(carbon);
        if (
            carbon.business_type == "other" ||
            carbon.business_type == "ecommerce" ||
            carbon.skip_btn == "skip"
        ) {
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
            });
        } else {
            $(".greenplace_step_four").hide();
            $(".greenplace_step_five").show();
            $(".greenp-annual-carbon-wrapper").hide();
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
        }
    });
    $(".back_button_two").click(function () {
        $(".model-error").hide();
        $(".greenplace_step_two").hide();
        $(".greenplace_step_three").show();
    });
    $(".back_button_three").click(function () {
        $(".model-error").hide();
        $(".greenplace_step_three").hide();
        if (
            carbon.business_type == "software" ||
            carbon.business_type == "professional_service" ||
            carbon.business_type == "retail"
        ) {
            $(".greenplace_step_subthree").show();
        } else {
            $(".greenplace_step_one").show();
        }
    });
    $(".back_button_four").click(function () {
        $(".model-error").hide();
        $(".greenplace_step_four").hide();
        if (
            carbon.business_type == "professional_service" ||
            carbon.business_type == "retail"
        ) {
            $(".greenplace_step_three").show();
        } else if (carbon.business_type == "software") {
            $(".greenplace_step_two").show();
        } else {
            $(".greenplace_step_one").show();
        }
    });
    $(".back_button_subthree").click(function () {
        $(".model-error").hide();
        $(".greenplace_step_subthree").hide();
        $(".greenplace_step_one").show();
    });
    $(".back_button_five").click(function () {
        $(".model-error").hide();
        $(".greenplace_step_four").show();
        $(".greenplace_step_five").hide();
    });
    $(".finish").click(function () {
        $(".greenplace_step_five").show();
        $(".greenplace_step_four").hide();
    });
    $(".close").click(function () {
        window.location.reload();
    });
});
