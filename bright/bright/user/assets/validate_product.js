$(document).ready(function() {
    var colspan = $('#tr-empty').parent('tbody').siblings('thead').find('tr > th').length;
    $('#tr-empty > td:first').attr('colspan', colspan);
    $('.inactivate_membership_package').on('click', function () {
        var confirm_msg = $("#confirm_msg_inactivate").html();
        if (confirm(confirm_msg)) {
            $(this).closest('form').submit();
        }
    });
    $('.delete_membership_package').on('click', function () {
        var confirm_msg = $("#confirm_msg_delete").html();
        if (confirm(confirm_msg)) {
            $(this).closest('form').submit();
        }
    });
    $('.activate_membership_package').on('click', function () {
        var confirm_msg = $("#confirm_msg_activate").html();
        if (confirm(confirm_msg)) {
            $(this).closest('form').submit();
        }
    });

    $('.inactivate_repurchase_package').on('click', function () {
        var confirm_msg = $("#confirm_msg_inactivate").html();
        if (confirm(confirm_msg)) {
            $(this).closest('form').submit();
        }
    });
    $('.delete_repurchase_package').on('click', function () {
        var confirm_msg = $("#confirm_msg_delete").html();
        if (confirm(confirm_msg)) {
            $(this).closest('form').submit();
        }
    });
    $('.activate_repurchase_package').on('click', function () {
        var confirm_msg = $("#confirm_msg_activate").html();
        if (confirm(confirm_msg)) {
            $(this).closest('form').submit();
        }
    });
    $("#product_amount,#pair_value,#pair_price,#package_validity").keypress(function(e) {
        if (e.which == 0 || e.which == 8) {
            return;
        }
        var regex = new RegExp("^[0-9]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        else {
            var msg = $("#validate_msg1").html();
            showErrorSpanOnKeyup(this, msg);
            return false;
        }
    });
    $("#package_id").keypress(function(e) {
        if (e.which == 0 || e.which == 8) {
            return;
        }
        var regex = new RegExp("^[a-zA-Z0-9]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        else {
            var msg = $("#validate_msg14").html();
            showErrorSpanOnKeyup(this, msg);
            return false;
        }
    });

});

function showErrorSpanOnKeyup(element, message) {
    var span = "<span class='keyup_error' style='color: #b94a48;'>" + message + "</span>";
    if ($(element).closest('.input-group').length) {
        $(element).closest('.input-group').next('span.keyup_error').remove();
        $(element).closest('.input-group').after(span);
        $(element).closest('.input-group').next('span:first').fadeOut(2000, 0);
    }
    else {
        $(element).next('span.keyup_error').remove();
        $(element).after(span);
        $(element).next('span:first').fadeOut(2000, 0);
    }
}

var ValidateProduct = function() {

    var msg = $("#error_msg").html();
    var msg1 = $("#error_msg1").html();
    var msg2 = $("#error_msg2").html();
    var msg3 = $("#error_msg3").html();
    var msg4 = $("#validate_msg_img2").html();
    var msg5 = $("#validate_msg_img1").html();
    var msg6 = $("#error_msg4").html();
    var msg8 = $("#validate_msg8").html();
    var msg9 = $("#validate_msg9").html();
    var msg10 = $("#error_msg5").html();
    var msg11 = $("#validate_msg11").html();
    var msg12 = $("#validate_msg12").html();
    var msg13 = $("#validate_msg13").html();
    var msg14 = $("#validate_msg14").html();

    var runValidateProduct = function() {

    	var searchform = $('#form');
    	var errorHandler1 = $('.errorHandler', searchform);
        $.validator.addMethod("non_zero", function(value, element) {
           return  /^[1-9]\d*$/.test(value);
        }, 'Enter a positive number');
        $.validator.addMethod("alpha_num", function(value, element) {
            return this.optional(element) || value == value.match(/^[A-Za-z0-9]+$/);
        }, msg10);
    	$('#form').validate({
    		errorElement: "span", 
    		errorClass: 'help-block',
    		errorPlacement: function(error, element) { 
                    if($(element).parent('.input-group').length === 0) {
    			error.insertAfter(element);
                    }
                    else {
                        error.insertAfter($(element).closest('.input-group'));
                    }

    		},
    		ignore: ':hidden',
    		rules: {
    			prod_name: {
                            required: true,
                            maxlength: 32,
    			},
    			product_id: {
                            required: true
    			},
    			product_amount: {
                            required: true,
                            number: true,
                            min: 0
    			},
    			pair_value: {
                            required: true,
                            digits: true
                        },
                        pair_price: {
                            required: true,
                            number: true,
                            min: 0
    			},
                        package_id: {
    				required: true,
                                maxlength: 6,
                                alpha_num:true
    			},
    			bv_value: {
    				required: true
    			},
    			package_validity: {
    				required: true,
    				digits: true,
                                non_zero: true
    			},
                        referral_commission: {
                            required: true,
                            digits: true,
                            min: 0,
                            max: 100
                        }
    		},
    		messages: {
    			prod_name: {
                            required: msg
                        },
    			product_id: msg1,
    			product_amount: {
                            required: msg3,
                            min: msg9,
                            number:msg9
                        },
    			pair_value: {
                            required: msg6,
                            digits: msg9
                        },
    			pair_price: {
                            required: msg11,
                            min: msg9,
                            number:msg9
                        },
    			package_id: { 
                            required: msg10,
                            alpha_num:msg14
                        },
    			package_validity: {
    				required: msg8,
    				digits: msg9
    			},
                        referral_commission: {
                            required: msg12,
                            digits: msg13,
                            min: msg13,
                            max: msg13
                        }
                },
    		invalidHandler: function(event, validator) { 
    			errorHandler1.show();
    		},
    		highlight: function(element) {
    			$(element).closest('.help-block').removeClass('valid');

    			$(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');

    		},
    		unhighlight: function(element) { 
    			$(element).closest('.form-group').removeClass('has-error');
    		},
    		success: function(label, element) {
    			label.addClass('help-block valid');
    			$(element).closest('.form-group').removeClass('has-error').addClass('ok');
    		}
    	});
    };
    
    return {
    	init: function() {
    		runValidateProduct();
    	}
    };
}();

function edit_membership_package(id) {
//    var confirm_msg = $("#confirm_msg_edit").html();
//    if (confirm(confirm_msg)) {
        document.location.href = $('#base_url').val() + 'admin/product/edit_membership_package/' + id;
//    }
}

function edit_repurchase_package(id) {
//    var confirm_msg = $("#confirm_msg_edit").html();
//    if (confirm(confirm_msg)) {
        document.location.href = $('#base_url').val() + 'admin/product/edit_repurchase_package/' + id;
//    }
}

