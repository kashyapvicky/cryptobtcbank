function change_day(e)
{
    var dob = document.form.date_of_birth.value;
    var day = e.value;
    var new_dob = dob.substr(0, 7);
    document.form.date_of_birth.value = new_dob + "-" + day;
}

function change_month(e)
{
    var dob = document.form.date_of_birth.value;
    var month = e.value;
    var year = dob.substr(0, 4);
    var day = dob.substr(7, 3);
    document.form.date_of_birth.value = year + "-" + month + "-" + day;
}

function change_year(e)
{

    var dob = document.form.date_of_birth.value;
    var year = e.value;
    var new_dob = dob.substr(4, 10);
    document.form.date_of_birth.value = year + new_dob;
}

function day_month(e) {
    var day = document.getElementById("day").value;
    var year = document.getElementById("year").value;
    var i = 1;
    var month = e.value;
    var month_day = new Array();
    var option = "";
    var j = 28;

    var d = new Date();
    var current_month = d.getMonth() + 1;
    var current_year = d.getFullYear();
    var current_day = d.getDate();
    option = option + "<option value=''>DD</option>";

    if (month == current_month && year == current_year)
    {
        for (i = 1; i <= current_day; i++) {
            var option_value = (i < 10) ? ("0" + i) : i;
            option = option + "<option value=" + option_value;
            if (day != "" && option_value == day)
            {
                option = option + " selected ";
            }
            option = option + ">" + option_value + "</option>";
        }
        document.getElementById('day').innerHTML = option;

    } else {
        if (month == '4' || month == '6' || month == '9' || month == '11' || month == '04' || month == '06' || month == '09')
        {

            for (i = 1; i <= 30; i++) {
                var option_value = (i < 10) ? ("0" + i) : i;
                option = option + "<option value=" + option_value;
                if (day != "" && option_value == day)
                    option = option + " selected ";
                option = option + ">" + option_value + "</option>";
            }
            document.getElementById('day').innerHTML = option;
        } else if (month == '2' || month == '02')
        {

            if (year % 4 == '0')
            {
                j = 29;
            }
            for (i = 1; i <= j; i++) {
                var option_value = (i < 10) ? ("0" + i) : i;
                option = option + "<option value=" + option_value;
                if (day != "" && option_value == day)
                    option = option + " selected ";
                option = option + ">" + option_value + "</option>";
            }
            document.getElementById('day').innerHTML = option;
        } else
        {
            for (i = 1; i <= 31; i++) {
                var option_value = (i < 10) ? ("0" + i) : i;
                option = option + "<option value=" + option_value;
                if (day != "" && option_value == day)
                    option = option + " selected ";
                option = option + ">" + option_value + "</option>";
            }
            document.getElementById('day').innerHTML = option;
        }


    }

}
function day_year(e) {
    var day = document.getElementById("day").value;
    var month = document.getElementById("month").value;
    var i = 1;
    var year = e.value;
    var month_day = new Array();
    var option = "";
    var option1 = "";
    var j = 28;
    var d = new Date();
    var current_month = d.getMonth() + 1;
    var current_year = d.getFullYear();
    var current_day = d.getDay();
    option = option + "<option value=''>DD</option>";
    option1 = option1 + "<option value=''>MM</option>";
    if (year == current_year)
    {
        for (i = 1; i <= current_month; i++) {
            var option_value = (i < 10) ? ("0" + i) : i;
            option1 = option1 + "<option value=" + option_value;
            if (day != "" && option_value == day)
                option1 = option1 + " selected ";
            option1 = option1 + ">" + option_value + "</option>";
        }

        document.getElementById('month').innerHTML = option1;
    } else {
        for (i = 1; i <= 12; i++) {
            var option_value = (i < 10) ? ("0" + i) : i;
            option1 = option1 + "<option value=" + option_value;
            if (day != "" && option_value == day)
                option1 = option1 + " selected ";
            option1 = option1 + ">" + option_value + "</option>";
        }
        document.getElementById('month').innerHTML = option1;
    }
    if (month == '04' || month == '06' || month == '09' || month == '11')
    {
        for (i = 1; i <= 30; i++) {
            var option_value = (i < 10) ? ("0" + i) : i;
            option = option + "<option value=" + option_value;
            if (day != "" && option_value == day)
                option = option + " selected ";
            option = option + ">" + option_value + "</option>";
        }
        document.getElementById('day').innerHTML = option;
    } else if (month == '02')
    {

        if (year % 4 == '0')
        {
            j = 29;
        }
        for (i = 1; i <= j; i++) {
            var option_value = (i < 10) ? ("0" + i) : i;
            option = option + "<option value=" + option_value;
            if (day != "" && option_value == day)
                option = option + " selected ";
            option = option + ">" + option_value + "</option>";
        }
        document.getElementById('day').innerHTML = option;
    } else
    {
        for (i = 1; i <= 31; i++) {
            var option_value = (i < 10) ? ("0" + i) : i;
            option = option + "<option value=" + i;
            if (day != "" && i == day)
                option = option + " selected ";
            option = option + ">" + i + "</option>";
        }
        document.getElementById('day').innerHTML = option;
    }

}

//validate crd
function expiry_month(e)
{
    var exm = document.form.card_expiry_date.value;
    month = e.value;
    var year = exm.substr(0, 4);
    //var day = dob.substr(7,3);
    document.form.card_expiry_date.value = year + "-" + month;


}

function expiry_year(e)
{
    var exm = document.form.card_expiry_date.value;
    year = e.value;
    var new_exm = exm.substr(4, 10);
    document.form.card_expiry_date.value = year + new_exm;

}

function isAgeMoreThanOrEqual(day, month, year, age) {
    return new Date(year+age, month-1, day) <= new Date();
}

function isAgeMoreThanOrEqualYear(year, age_limit) {
    var d = new Date();
    var current_year = d.getFullYear();
    return (current_year - year) >= age_limit;
}

function showErrorSpanOnKeyup(element, message) {
    var span = "<span class='keyup_error' style='color:#b94a48;'>" + message + "</span>";
    $(element).next('span.keyup_error').remove();
    $(element).after(span);
    $(element).next('span:first').fadeOut(2000, 0);
}

//var ValidatePersonalInfo = function () {
//    var msg11 = $("#validate_msg30").html();
//    var msg12 = $("#validate_msg31").html();
//    var msg13 = $("#validate_msg32").html();
//    var msg14 = $("#validate_msg33").html();
//    var msg15 = $("#validate_msg34").html();
//    var msg16 = $("#validate_msg35").html();
//    var msg23 = $("#validate_msg40").html();
//    var msg24 = $("#validate_msg41").html();
//    var msg35 = $("#validate_msg81").html();
//    var msg40 = $("#validate_msg67").html();
//    var msg41 = $("#validate_msg69").html();
//    var msg42 = $("#validate_msg70").html();
//    var msg43 = $("#validate_msg73").html();
//    var msg75 = $("#validate_msg75").html();
//    var msg78 = $("#validate_msg78").html();
//    var msg81 = $("#validate_msg81").html();
//    var msg90 = $("#validate_msg90").html();
//    var msg91 = $("#validate_msg91").html();
//    var msg92 = $("#validate_msg92").html();
//    var msg93 = $("#validate_msg93").html();
//    msg90 = msg90.replace('%s', $('#age_limit').val());
//
//    var initValidator = function () {
//        
//        $.validator.addMethod("alpha_numeric", function(value, element) {
//            return this.optional(element) || value == value.match(/^[a-zA-Z0-9]+$/);
//        }, msg35);
//        
//        $.validator.addMethod("alpha_city", function(value, element) {
//            return this.optional(element) || value == value.match(/^[a-zA-Z0-9\s\.\,\-]+$/);
//        }, msg78);
//        
//        $.validator.addMethod("alpha_space", function(value, element) {
//            return this.optional(element) || value == value.match(/^[a-zA-Z ]+$/);
//        }, msg35);
//
//        $.validator.addMethod("valid_age", function(value, element) {
//            var dob = $('#dob').val();
//            var d = dob.split('-');
//            var year = parseInt(d[0]);
//            var month = parseInt(d[1]);
//            var day = parseInt(d[2]);
//            var age_limit = parseInt($('#age_limit').val());
//            if (age_limit == 0) {
//                return true;
//            }
//
//            // age validation based on year, month and day
//            // var res = isAgeMoreThanOrEqual(day, month, year, age_limit);
//
//            // age validation based on year
//            var res = isAgeMoreThanOrEqualYear(year, age_limit);
//            
//            return res;
//        });

//        $("#edit_user_profile").validate({
//            errorElement: "span",
//            errorClass: 'help-block',
//            onsubmit: false,
//            errorPlacement: function (error, element) {
//                if ($(element).next('span').hasClass('combodate')) {
//                    error.insertAfter($(element).next('span'));
//                }
//                else {
//                    error.insertAfter(element);
//                }
//            },
//            ignore: ':hidden:not(#dob)',
//            rules: {
//                first_name: {
//                    minlength: 3,
//                    maxlength: 32,
//                    required: true,
//                    alpha_space: true
//                },
//                last_name: {
//                    minlength: 3,
//                    maxlength: 32,
//                    alpha_space: true
//                },
//                gender: {
//                    required: true
//                },
//                dob: {
//                    valid_age: {
//                        depends: function(element) {
//                            return $('#year').is(':visible') && $('#month').is(':visible') && $('#day').is(':visible') && $('#year').valid() && $('#month').valid() && $('#day').valid();
//                        }
//                    }
//                },
//                year: {
//                    required: true
//                },
//                month: {
//                    required: true
//                },
//                day: {
//                    required: true
//                },
//                address: {
//                    minlength: 3,
//                    maxlength: 32,
//                    required: true
//                },
//                address2: {
//                    minlength: 3,
//                    maxlength: 32
//                },
//                country: {
//                    required: true
//                },
//                state: {
//                    
//                },
//                city: {
//                    required: true,
//                    minlength: 3,
//                    maxlength: 32,
//                    alpha_city: true
//                },
//                pincode: {
//                    minlength: 3,
//                    maxlength: 10,
//                    digits: true
//                },
//                email: {
//                    required: true,
//                    email: true
//                },
//                mobile: {
//                    required: true,
//                    minlength: 5,
//                    maxlength: 10,
//                    digits: true
//                },
//                land_line: {
//                    minlength: 5,
//                    maxlength: 10,
//                    digits: true
//                },
//                bank_name: {
//                    minlength: 3,
//                    maxlength: 32,
//                    alpha_space: true
//                },
//                branch_name: {
//                    minlength: 3,
//                    maxlength: 32,
//                    alpha_space: true
//                },
//                account_holder: {
//                    minlength: 3,
//                    maxlength: 32,
//                    alpha_space: true
//                },
//                account_no: {
//                    minlength: 3,
//                    maxlength: 32,
//                    alpha_numeric: true
//                },
//                ifsc: {
//                    minlength: 3,
//                    maxlength: 32,
//                    alpha_numeric: true
//                },
//                pan: {
//                    minlength: 3,
//                    maxlength: 32,
//                    alpha_numeric: true
//                },
//                paypal_account: {
//                    email: true
//                },
//                blockchain_account: {
//                    alpha_numeric: true
//                },
//                bitgo_account: {
//                    alpha_numeric: true
//                },
//                facebook: {
//                    url: true
//                },
//                twitter: {
//                    url: true
//                }
//            },
//            messages: {
//                first_name: {
//                    required: msg43,
//                    alpha_space: msg91,
//                    minlength: msg41
//                },
//                last_name: {
//                    alpha_space: msg91,
//                    minlength: msg41
//                },
//                gender: msg14,
//                dob: {
//                    valid_age: msg90
//                },
//                year: {
//                    required: msg13
//                },
//                month: {
//                    required: msg12
//                },
//                day: {
//                    required: msg11
//                },
//                address: {
//                    required: msg24,
//                    minlength: msg41
//                },
//                address2: {
//                    minlength: msg41
//                },
//                country: msg15,
//                email: {
//                    required: msg23,
//                    email: msg16
//                },
//                city: {
//                    required: msg40,
//                    alpha_city: msg78
//                },
//                pincode: {
//                    minlength: msg41,
//                    digits: msg81,
//                    minlength: jQuery.format(msg92),
//                    maxlength: jQuery.format(msg93),
//                },
//                mobile: {
//                    digits: msg81,
//                    minlength: jQuery.format(msg92),
//                    maxlength: jQuery.format(msg93),
//                },
//                land_line: {
//                    digits: msg81,
//                    minlength: jQuery.format(msg92),
//                    maxlength: jQuery.format(msg93),
//                },
//                bank_name: {
//                    alpha_space: msg91
//                },
//                branch_name: {
//                    alpha_space: msg91
//                },
//                account_holder: {
//                    alpha_space: msg91
//                },
//                account_no: {
//                    alpha_numeric: msg75,
//                },
//                pan: {
//                    alpha_numeric: msg75,
//                },
//                ifsc: {
//                    alpha_numeric: msg75,
//                },
//                paypal_account: {
//                    email: msg16
//                },
//                blockchain_account: {
//                    alpha_numeric: msg75,
//                },
//                bitgo_account: {
//                    alpha_numeric: msg75,
//                }
//            },
//            onkeyup: function(element) { 
//                $(element).valid(); 
//            },
//            onfocusout: function(element) { 
//                $(element).valid(); 
//            },
//            highlight: function (element) {
//                if ($(element).closest('.combodate').length) {
//                    $(element).closest('div').addClass('has-error');
//                }
//                else {
//                    $(element).closest('.form-group').addClass('has-error');
//                }
//            },
//            unhighlight: function (element) {
//                if ($(element).closest('.combodate').length) {
//                    $(element).closest('div').removeClass('has-error');
//                }
//                else {
//                    $(element).closest('.form-group').removeClass('has-error');
//                }
//            },
//            success: function (label) {
//                if ($(label).attr('for') == 'dob') {
//                    $(label).closest('.has-error').removeClass('has-error');
//                }
//            }
//        });
//    };
//
//    return {
//        init: function () {
//            //initValidator();
//        }
//    };
//}();

$(function () {
    var base_url = $('#base_url').val();

    $("#ifsc,#pan,#blockchain_account,#account_no,#bitgo_account").on('keypress', function(e) {
        if (e.which == 0 || e.which == 8) {
            return;
        }
        var regex = new RegExp("^[a-zA-Z0-9]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        else {
            var msg = $("#validate_msg75").html();
            showErrorSpanOnKeyup(this, msg);
            return false;
        }
    });

    $("#first_name,#last_name,#bank_name,#branch_name,#account_holder").on('keypress', function(e) {
        if (e.which == 0 || e.which == 8) {
            return;
        }
        var regex = new RegExp("^[a-zA-Z ]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        else {
            var msg = $("#validate_msg91").html();
            showErrorSpanOnKeyup(this, msg);
            return false;
        }
    });
            
    $("#pincode,#mobile,#land_line").on('keypress', function(e) {
        if (e.which == 0 || e.which == 8) {
            return;
        }
        var regex = new RegExp("^[0-9]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        else {
            var msg = $("#validate_msg37").html();
            showErrorSpanOnKeyup(this, msg);
            return false;
        }
    });

    $("#city").on('keypress', function(e) {
        if (e.which == 0 || e.which == 8) {
            return;
        }
        var regex = new RegExp("^[a-zA-Z0-9 \.\,\-]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        else {
            var msg = $("#validate_msg78").html();
            showErrorSpanOnKeyup(this, msg);
            return false;
        }
    });

    // INITIAL STATE
    $('#upload_profile_image').hide();
    $('#personal_info_div').find('input').hide();
    $('#personal_info_div').find('select').hide();
    $('#update_personal_info').hide();
    $('#cancel_personal_info').hide();
    $('#contact_info_div').find('input').hide();
    $('#contact_info_div').find('select').hide();
    $('#update_contact_info').hide();
    $('#cancel_contact_info').hide();
    $('#bank_info_div').find('input').hide();
    $('#update_bank_info').hide();
    $('#cancel_bank_info').hide();
    $('#social_info_div').find('input').hide();
    $('#social_info_div').find('input').next('font').hide();
    $('#update_social_info').hide();
    $('#cancel_social_info').hide();
    $('#payment_details_div').find('input').hide();
    $('#update_payment_details').hide();
    $('#cancel_payment_details').hide();

    $('form').find('input,select').each(function(i, elem) {
         var input = $(elem);
         input.data('initialState', input.val());
    });
    
    // DATE OF BIRTH VALIDATION FIX
    $('#dob').on('change', function () {
        if (this.value) {
            $(this).valid();
        }
        else {
            $('span[for="dob"]').closest('.form-group').removeClass('has-error');
            $('span[for="dob"]').remove();
        }
    });

    // PROFILE IMAGE
    $('#edit_profile_image').on('click', function () {
        $(this).closest('.alert').remove();
        $('#profile_image').hide();
        $('#upload_profile_image').show();
        $('#cancel_personal_info,#cancel_contact_info,#cancel_bank_info,#cancel_social_info,#cancel_payment_details').click();
    });

    $('#cancel_profile_image').on('click', function () {
        $(this).closest('.alert').remove();
        $('#profile_image').show();
        $('#upload_profile_image').hide();
        $('#upload_profile_image').find('img').attr('src', $('#profile_image').find('img').attr('src'));
    });

    $('#update_profile_image').on('click', function () {
        $(this).closest('.alert').remove();
        var file_data = $('#userfile').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('inf_token', $('input[name="inf_token"]').val());
        form_data.append('user_name', $('input[name="profile_user"]').val());
        $.ajax({
            url: base_url + getUserType() + '/profile/update_profile_image',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,                         
            type: 'post',
            beforeSend: function() {
                $('#update_profile_image').attr('disabled', true);
            },
            success: function(data) {
                if (data['error']) {
                    $('#alert_div').contents().clone().addClass('alert-danger').append(data['message']).prependTo('#profile_image_div');
                }
                else if (data['success']) {
                    var new_image_url = base_url + 'public_html/images/profile_picture/' + data['file_name'];
                    $('#profile_image').find('img').attr('src', new_image_url);
                    $('#upload_profile_image').find('img').attr('src', new_image_url);
                    $('#alert_div').contents().clone().addClass('alert-success').append(data['message']).prependTo('#profile_image_div');
                    $('#profile_image').show();
                    $('#upload_profile_image').hide();
                }
            },
            error: function() {

            },
            complete: function() {
                $('#update_profile_image').attr('disabled', false);
            }
        });
    });

    // PERSONAL INFO
    $('#edit_personal_info').on('click', function () {
        $('#personal_info_div').find('.alert').remove();
        $(this).hide();
        $('#cancel_profile_image,#cancel_contact_info,#cancel_bank_info,#cancel_social_info,#cancel_payment_details').click();
        $('#personal_info_div').find('.form-control-static').hide();
        $('#personal_info_div').find('.form-control-static').next('input,select').show();
        $('#update_personal_info,#cancel_personal_info').show();

        $('#personal_info_div').find('input,select').each(function(i, elem) {
             var input = $(elem);
             input.val(input.data('initialState'));
             if (input.val() == 'NA') {
                input.val('');
             }
        });
        
        $('#dob').combodate({
            format: 'YYYY-MM-DD',
            template: 'YYYY MM DD',
            smartDays: true,
            minYear: 1900,
            maxYear: (new Date()).getFullYear(),
            yearDescending: false,
            firstItem: 'name',
            customClass: 'form-control',
            errorClass: 'none'
        });
        $('.year.form-control').wrap('<div></div>');
        $('.year.form-control').attr('name', 'year');
        $('.year.form-control').attr('id', 'year');
        $('.month.form-control').wrap('<div></div>');
        $('.month.form-control').attr('name', 'month');
        $('.month.form-control').attr('id', 'month');
        $('.day.form-control').wrap('<div></div>');
        $('.day.form-control').attr('name', 'day');
        $('.day.form-control').attr('id', 'day');

    });

    $('#cancel_personal_info').on('click', function () {
        $('#personal_info_div').find('.alert').remove();
        $('#dob').combodate('destroy');
        $('#dob').val($('#dob').data('value'));
        $('#personal_info_div').find('.form-control-static').show();
        $('#personal_info_div').find('.form-control-static').next('input,select').hide();
        $('#edit_personal_info').show();
        $('#update_personal_info,#cancel_personal_info').hide();
        $('.help-block').remove();
        $('body').find('.has-error').removeClass('has-error');
    });
    
//    $('#update_personal_info').on('click', function () {
//        $('#personal_info_div').find('.alert').remove();
//        $('#edit_user_profile').validate();
//
//        if ($('#first_name,#last_name,#gender,#year,#month,#day,#dob').valid()) {
//            $.ajax({
//                url: base_url + getUserType() + '/profile/update_personal_info',
//                dataType: 'json',
//                data: $('#personal_info_div input, #personal_info_div select, input[type="hidden"]'),
//                type: 'post',
//                beforeSend: function() {
//                    $('#update_personal_info').attr('disabled', true);
//                },
//                success: function(data) {
//                    if (data['error']) {
//                        $('#alert_div').contents().clone().addClass('alert-danger').append(data['message']).prependTo('#personal_info_div');
//                        if (data['form_error']) {
//                            $.each(data['form_error'], function (i, v) {
//                                if (v) {
//                                    var error_span = '<span class="help-block" style="color: red;" for="' + i + '">' + v + '</span>';
//                                    if (i == 'dob') {
//                                        $('.combodate').after(error_span);
//                                    }
//                                    else {
//                                        $('#' + i).after(error_span);
//                                    }
//                                }
//                            });
//                        }
//                    }
//                    else if (data['success']) {
//                        $('#alert_div').contents().clone().addClass('alert-success').append(data['message']).prependTo('#personal_info_div');
//                        $('#dob').combodate('destroy');
//                        $('#personal_info_div').find('.form-control-static').show();
//                        $('#personal_info_div').find('.form-control-static').next('input,select').hide();
//                        $('#edit_personal_info').show();
//                        $('#update_personal_info,#cancel_personal_info').hide();
//
//                        $('#personal_info_div').find('input,select').each(function(i, elem) {
//                            var input = $(elem);
//                            input.val(input.val());
//                            input.prev('.form-control-static').text(input.val());
//                            if (input.val() == '') {
//                                input.prev('.form-control-static').text('NA');
//                            }
//                            input.data('initialState', input.val());
//                        });
//                        $('#gender').prev('.form-control-static').text($('#gender option:selected').text());
//                    }
//                },
//                error: function() {
//
//                },
//                complete: function() {
//                    $('#update_personal_info').attr('disabled', false);
//                }
//            });
//        }
//    });

    // CONTACT INFO
    $('#edit_contact_info').on('click', function () {
        $('#contact_info_div').find('.alert').remove();
        $(this).hide();
        $('#cancel_profile_image,#cancel_personal_info,#cancel_bank_info,#cancel_social_info,#cancel_payment_details').click();
        $('#contact_info_div').find('.form-control-static').hide();
        $('#contact_info_div').find('.form-control-static').next('input,select').show();
        $('#contact_info_div').find('#prof_state_div > select').show();
        $('#update_contact_info,#cancel_contact_info').show();

        $('#contact_info_div').find('input,select').each(function(i, elem) {
             var input = $(elem);
             input.val(input.data('initialState'));
             if (input.val() == 'NA') {
                input.val('');
             }
        });
        
        $('#contact_info_div').find('input[value="NA"]').val('');
        if ($('#pincode').val() == '0') {
            $('#pincode').val('');
        }

    });

    $('#cancel_contact_info').on('click', function () {
        $('#contact_info_div').find('.alert').remove();
        $('#contact_info_div').find('.form-control-static').show();
        $('#contact_info_div').find('.form-control-static').next('input,select').hide();
        $('#contact_info_div').find('#prof_state_div > select').hide();
        $('#edit_contact_info').show();
        $('#update_contact_info,#cancel_contact_info').hide();
        $('.help-block').remove();
        $('body').find('.has-error').removeClass('has-error');
    });
    
//    $('#update_contact_info').on('click', function () {
//        $('#contact_info_div').find('.alert').remove();
//        $('#edit_user_profile').validate();
//
//        if ($('#address,#address2,#country,#state,#city,#pincode,#email,#mobile,#land_line').valid()) {
//            $.ajax({
//                url: base_url + getUserType() + '/profile/update_contact_info',
//                dataType: 'json',
//                data: $('#contact_info_div input, #contact_info_div select, input[type="hidden"]'),
//                type: 'post',
//                beforeSend: function() {
//                    $('#update_contact_info').attr('disabled', true);
//                },
//                success: function(data) {
//                    if (data['error']) {
//                        $('#alert_div').contents().clone().addClass('alert-danger').append(data['message']).prependTo('#contact_info_div');
//                        if (data['form_error']) {
//                            $.each(data['form_error'], function (i, v) {
//                                if (v) {
//                                    var error_span = '<span class="help-block" style="color: red;" for="' + i + '">' + v + '</span>';
//                                    $('#' + i).after(error_span);
//                                }
//                            });
//                        }
//                    }
//                    else if (data['success']) {
//                        $('#alert_div').contents().clone().addClass('alert-success').append(data['message']).prependTo('#contact_info_div');
//                        $('#contact_info_div').find('.form-control-static').show();
//                        $('#contact_info_div').find('.form-control-static').next('input,select').hide();
//                        $('#contact_info_div').find('#prof_state_div > select').hide();
//                        $('#edit_contact_info').show();
//                        $('#update_contact_info,#cancel_contact_info').hide();
//                        
//                        $('#contact_info_div').find('input,select').each(function(i, elem) {
//                            var input = $(elem);
//                            input.val(input.val());
//                            input.prev('.form-control-static').text(input.val());
//                            if (input.val() == '') {
//                                input.prev('.form-control-static').text('NA');
//                            }
//                            input.data('initialState', input.val());
//                        });
//                        $('#country').prev('.form-control-static').text($('#country option:selected').text());
//                        $('#prof_state_div').prev('.form-control-static').text($('#state option:selected').text());
//                        if ($('#state').val() == '' || $('#state').val() == 0) {
//                            $('#prof_state_div').prev('.form-control-static').text('NA');
//                        }
//                    }
//                },
//                error: function() {
//
//                },
//                complete: function() {
//                    $('#update_contact_info').attr('disabled', false);
//                }
//            });
//        }
//    });

    // BANK INFO
    $('#edit_bank_info').on('click', function () {
        $('#bank_info_div').find('.alert').remove();
        $(this).hide();
        $('#cancel_profile_image,#cancel_personal_info,#cancel_contact_info,#cancel_social_info,#cancel_payment_details').click();
        $('#bank_info_div').find('.form-control-static').hide();
        $('#bank_info_div').find('.form-control-static').next('input').show();
        $('#update_bank_info,#cancel_bank_info').show();

        $('#bank_info_div').find('input').each(function(i, elem) {
             var input = $(elem);
             input.val(input.data('initialState'));
             if (input.val() == 'NA') {
                input.val('');
             }
    });

    });

    $('#cancel_bank_info').on('click', function () {
        $('#bank_info_div').find('.alert').remove();
        $('#bank_info_div').find('.form-control-static').show();
        $('#bank_info_div').find('.form-control-static').next('input').hide();
        $('#edit_bank_info').show();
        $('#update_bank_info,#cancel_bank_info').hide();
        $('.help-block').remove();
        $('body').find('.has-error').removeClass('has-error');
    });
    
//    $('#update_bank_info').on('click', function () {
//        $('#bank_info_div').find('.alert').remove();
//        $('#edit_user_profile').validate();
//
//        if ($('#bank_name,#branch_name,#account_holder,#account_no,#ifsc,#pan').valid()) {
//            $.ajax({
//                url: base_url + getUserType() + '/profile/update_bank_info',
//                dataType: 'json',
//                data: $('#bank_info_div input, input[type="hidden"]'),
//                type: 'post',
//                beforeSend: function() {
//                    $('#update_bank_info').attr('disabled', true);
//                },
//                success: function(data) {
//                    if (data['error']) {
//                        $('#alert_div').contents().clone().addClass('alert-danger').append(data['message']).prependTo('#bank_info_div');
//                        if (data['form_error']) {
//                            $.each(data['form_error'], function (i, v) {
//                                if (v) {
//                                    var error_span = '<span class="help-block" style="color: red;" for="' + i + '">' + v + '</span>';
//                                    $('#' + i).after(error_span);
//                                }
//                            });
//                        }
//                    }
//                    else if (data['success']) {
//                        $('#alert_div').contents().clone().addClass('alert-success').append(data['message']).prependTo('#bank_info_div');
//                        $('#bank_info_div').find('.form-control-static').show();
//                        $('#bank_info_div').find('.form-control-static').next('input').hide();
//                        $('#edit_bank_info').show();
//                        $('#update_bank_info,#cancel_bank_info').hide();
//                        
//                        $('#bank_info_div').find('input').each(function(i, elem) {
//                            var input = $(elem);
//                            input.val(input.val());
//                            input.prev('.form-control-static').text(trim(input.val()));
//                            if (input.val() == '') {
//                                input.prev('.form-control-static').text('NA');
//                            }
//                            input.data('initialState', trim(input.val()));
//                        });
//                    }
//                },
//                error: function() {
//
//                },
//                complete: function() {
//                    $('#update_bank_info').attr('disabled', false);
//                }
//            });
//        }
//    });

    // SOCIAL PROFILE
//    $('#edit_social_info').on('click', function () {
//        $('#social_info_div').find('.alert').remove();
//        $(this).hide();
//        $('#cancel_profile_image,#cancel_personal_info,#cancel_contact_info,#cancel_bank_info,#cancel_payment_details').click();
//        $('#social_info_div').find('.form-control-static').hide();
//        $('#social_info_div').find('.form-control-static').next('input').show();
//        $('#update_social_info,#cancel_social_info').show();
//
//        $('#social_info_div').find('input').each(function(i, elem) {
//             var input = $(elem);
//             input.val(input.data('initialState'));
//             if (input.val() == 'NA') {
//                input.val('');
//             }
//        });
//
//    });

//    $('#cancel_social_info').on('click', function () {
//        $('#social_info_div').find('.alert').remove();
//        $('#social_info_div').find('.form-control-static').show();
//        $('#social_info_div').find('.form-control-static').next('input').hide();
//        $('#edit_social_info').show();
//        $('#update_social_info,#cancel_social_info').hide();
//        $('.help-block').remove();
//        $('body').find('.has-error').removeClass('has-error');
//    });
    
//    $('#update_social_info').on('click', function () {
//        $('#social_info_div').find('.alert').remove();
//        $('#edit_user_profile').validate();
//
//        if ($('#facebook,#twitter').valid()) {
//            $.ajax({
//                url: base_url + getUserType() + '/profile/update_social_info',
//                dataType: 'json',
//                data: $('#social_info_div input, input[type="hidden"]'),
//                type: 'post',
//                beforeSend: function() {
//                    $('#update_social_info').attr('disabled', true);
//                },
//                success: function(data) {
//                    if (data['error']) {
//                        $('#alert_div').contents().clone().addClass('alert-danger').append(data['message']).prependTo('#social_info_div');
//                        if (data['form_error']) {
//                            $.each(data['form_error'], function (i, v) {
//                                if (v) {
//                                    var error_span = '<span class="help-block" style="color: red;" for="' + i + '">' + v + '</span>';
//                                    $('#' + i).after(error_span);
//                                }
//                            });
//                        }
//                    }
//                    else if (data['success']) {
//                        $('#alert_div').contents().clone().addClass('alert-success').append(data['message']).prependTo('#social_info_div');
//                        $('#social_info_div').find('.form-control-static').show();
//                        $('#social_info_div').find('.form-control-static').next('input').hide();
//                        $('#edit_social_info').show();
//                        $('#update_social_info,#cancel_social_info').hide();
//                        
//                        $('#social_info_div').find('input').each(function(i, elem) {
//                            var input = $(elem);
//                            input.val(input.val());
//                            input.prev('.form-control-static').text(input.val());
//                            if (input.val() == '') {
//                                input.prev('.form-control-static').text('NA');
//                            }
//                            input.data('initialState', input.val());
//                        });
//                    }
//                },
//                error: function() {
//
//                },
//                complete: function() {
//                    $('#update_social_info').attr('disabled', false);
//                }
//            });
//        }
//    });

 
    // PAYMENT DETAILS
//    $('#edit_payment_details').on('click', function () {
//        $('#payment_details_div').find('.alert').remove();
//        $(this).hide();
//        $('#cancel_profile_image,#cancel_personal_info,#cancel_contact_info,#cancel_bank_info,#cancel_social_info').click();
//        $('#payment_details_div').find('.form-control-static').hide();
//        $('#payment_details_div').find('.form-control-static').next('input').show();
//        $('#update_payment_details,#cancel_payment_details').show();
//
//        $('#payment_details_div').find('input').each(function(i, elem) {
//             var input = $(elem);
//             input.val(input.data('initialState'));
//             if (input.val() == 'NA') {
//                input.val('');
//             }
//        });
//        
//    });

//    $('#cancel_payment_details').on('click', function () {
//        $('#payment_details_div').find('.alert').remove();
//        $('#payment_details_div').find('.form-control-static').show();
//        $('#payment_details_div').find('.form-control-static').next('input').hide();
//        $('#edit_payment_details').show();
//        $('#update_payment_details,#cancel_payment_details').hide();
//        $('.help-block').remove();
//        $('body').find('.has-error').removeClass('has-error');
//    });
    
//    $('#update_payment_details').on('click', function () {
//        $('#payment_details_div').find('.alert').remove();
//        $('#edit_user_profile').validate();
//
//        if ($('#paypal_account,#blockchain_account,#bitgo_account,#blocktrail_account').valid()) {
//            $.ajax({
//                url: base_url + getUserType() + '/profile/update_payment_details',
//                dataType: 'json',
//                data: $('#payment_details_div input, input[type="hidden"]'),
//                type: 'post',
//                beforeSend: function() {
//                    $('#update_payment_details').attr('disabled', true);
//                },
//                success: function(data) {
//                    if (data['error']) {
//                        $('#alert_div').contents().clone().addClass('alert-danger').append(data['message']).prependTo('#payment_details_div');
//                        if (data['form_error']) {
//                            $.each(data['form_error'], function (i, v) {
//                                if (v) {
//                                    var error_span = '<span class="help-block" style="color: red;" for="' + i + '">' + v + '</span>';
//                                    $('#' + i).after(error_span);
//                                }
//                            });
//                        }
//                    }
//                    else if (data['success']) {
//                        $('#alert_div').contents().clone().addClass('alert-success').append(data['message']).prependTo('#payment_details_div');
//                        $('#payment_details_div').find('.form-control-static').show();
//                        $('#payment_details_div').find('.form-control-static').next('input').hide();
//                        $('#edit_payment_details').show();
//                        $('#update_payment_details,#cancel_payment_details').hide();
//                        
//                        $('#payment_details_div').find('input').each(function(i, elem) {
//                            var input = $(elem);
//                            input.val(input.val());
//                            input.prev('.form-control-static').text(input.val());
//                            if (input.val() == '') {
//                                input.prev('.form-control-static').text('NA');
//                    }
//                            input.data('initialState', input.val());
//                        });
//                    }
//                },
//                error: function() {
//
//                },
//                complete: function() {
//                    $('#update_payment_details').attr('disabled', false);
//                }
//            });
//        }
//    });
    
    });
    
    $('#tab1').on('click', function () {
        $('#cancel_profile_image,#cancel_contact_info,#cancel_bank_info,#cancel_social_info,#cancel_payment_details').click();
    });
    $('#tab2').on('click', function () {
        $('#cancel_profile_image,#cancel_personal_info,#cancel_bank_info,#cancel_social_info,#cancel_payment_details').click();
    });
    $('#tab3').on('click', function () {
        $('#cancel_profile_image,#cancel_contact_info,#cancel_bank_info,#cancel_personal_info,#cancel_payment_details').click();
    });
    $('#tab4').on('click', function () {
        $('#cancel_profile_image,#cancel_contact_info,#cancel_personal_info,#cancel_social_info,#cancel_payment_details').click();
    });
    $('#tab5').on('click', function () {
        $('#cancel_profile_image,#cancel_contact_info,#cancel_bank_info,#cancel_social_info,#cancel_personal_info').click();
    });
    
function trim(a)
{
    return a.replace(/^\s+|\s+$/, '');
}