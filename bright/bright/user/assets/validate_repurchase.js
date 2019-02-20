
var ValidateUser = function () {



    var runValidatorweeklySelection = function () {

        var msg1 = $("#error_msg1").html();
        var msg2 = $("#error_msg2").html();
        var msg3 = $("#error_msg3").html();
        var msg4 = $("#error_msg4").html();
        var msg5 = $("#error_msg5").html();
        var msg6 = $("#error_msg6").html();
        var msg7 = $("#error_msg7").html();
        var msg_alpha_spec = $("#error_alpha_spec").html();
        var msg_alpha_city = $("#error_alpha_city").html();

        $.validator.addMethod("alpha_spec", function (value, element) {
            return this.optional(element) || value == value.match(/^[a-zA-Z ]+$/);
        }, msg_alpha_spec);
        $.validator.addMethod("alpha_city", function (value, element) {
            return this.optional(element) || value == value.match(/^[a-zA-Z0-9\s\.\,]+$/);
        }, msg_alpha_city);

        var searchform = $('#add_address');
        var errorHandler1 = $('.errorHandler', searchform);
        $('#add_address').validate({
            errorElement: "span",
            errorClass: 'help-block',
            errorPlacement: function (error, element) {
                error.insertAfter(element);
            },
            ignore: ':hidden',
            rules: {
                full_name: {
                    required: true,
                    alpha_spec: true,
                    minlength: 3,
                    maxlength: 32
                },
                address: {
                    required: true,
                    minlength: 5
                },
                pin_no: {
                    required: true,
                    digits: true,
                    minlength: 3,
                    maxlength: 6
                },
                city: {
                    required: true,
                    alpha_city: true,
                    minlength: 2
                },
                phone: {
                    required: true,
                    digits: true,
                    minlength: 5,
                    maxlength: 15
                }

            },
            messages: {
//				full_name: msg1,
//				address: msg2,
                pin_no: {
//					required: msg3,
//					number: msg4
                },
//				city: msg5,
                phone: {
//					number: msg7,
//					required: msg6
                }

            },
            invalidHandler: function (event, validator) {
                errorHandler1.show();
            },
            highlight: function (element) {

                $(element).closest('.help-block').removeClass('valid');
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');

            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');

            },
            success: function (label, element) {

                label.addClass('help-block valid');
                $(element).closest('.form-group').removeClass('has-error').addClass('ok');
            }
        });
    };

    var runValidatorProductAdding = function () {
        var msg1 = $("#error_msg1").html();
        var msg2 = $("#error_msg2").html();
        var msg3 = $("#error_msg3").html();
        var msg4 = $("#error_msg4").html();

        var searchform = $('#request');
        var errorHandler1 = $('.errorHandler', searchform);


        $('#request').validate({
            errorElement: "span",
            errorClass: 'help-block',
            errorPlacement: function (error, element) {
                if ($(element).parent('.input-group').length === 0) {
                    error.insertAfter(element);
                } else {
                    error.insertAfter($(element).closest('.input-group'));
                }
            },
            ignore: ':hidden',
            rules: {
                product_qty: {
                    minlength: 1,
                    required: true,
                    number: true,
                    digits: true,
                    min: 1
                }

            },
            messages: {
                product_qty: {
                    required: msg1,
                    min: msg2,
                    number: msg3,
                    digits: msg4
                }

            },
            invalidHandler: function (event, validator) {
                errorHandler1.show();
            },
            highlight: function (element) {

                $(element).closest('.help-block').removeClass('valid');
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');

            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');

            },
            success: function (label, element) {

                label.addClass('help-block valid');
                $(element).closest('.form-group').removeClass('has-error').addClass('ok');
            }
        });
    };
    var runValidatorReportDate = function () {
        var msg1 = $("#error_msg1").html();
        var msg2 = $("#error_msg2").html();
        var msg4 = $("#error_msg3").html();
        var msg3 = $("#error_msg10").html();
        var searchform = $('#repurchase_report');
        var errorHandler1 = $('.errorHandler', searchform);
        $('#repurchase_report').validate({
            errorElement: "span",
            errorClass: 'help-block',
            errorPlacement: function (error, element) {
                error.insertAfter($(element).closest('.input-group'));
            },
            ignore: ':hidden',
            rules: {
                week_date1: {
//					required: true,
                    minlength: 1,
                    date: true
                },
                week_date2: {
//					required: true,
                    minlength: 1,
//                    to_date_greaterthan_from_date: true,
                    date: true
                }
            },
            messages: {
                week_date1: {
//					required: msg1,
                    date: msg3
                },
                week_date2: {
//					required: msg2,
                    to_date_greaterthan_from_date: msg4,
                    date: msg3
                }

            },
            invalidHandler: function (event, validator) {
                errorHandler1.show();
            },
            highlight: function (element) {

                $(element).closest('.help-block').removeClass('valid');
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');

            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');

            },
            success: function (label, element) {

                label.addClass('help-block valid');
                $(element).closest('.form-group').removeClass('has-error').addClass('ok');
            }
        });
        jQuery.validator.addMethod('to_date_greaterthan_from_date', function (ToDate) {
            if ($("#week_date1").val() && $("#week_date2").val()) {
                var FromDate = $("#week_date1").val();
                return (ToDate >= FromDate);
            }
        }, "");
    };
    return {
        init: function () {
            runValidatorweeklySelection();
            runValidatorProductAdding();
            runValidatorReportDate();

        }
    };
}();

function loadEpinBlur() {
    $('#epin_submit').attr('disabled', true);
}

$(function () {
    $('table#p_scents > tbody > tr > td:eq(1) > .epin_input').on('blur', function () {
        $('#epin_submit').attr('disabled', true);
    });
    var invalid_span = '<span><i style="color: red;" class="fa fa-times-circle"></i>&nbsp;Invalid E-Pin</span>';
    var valid_span = '<span><i style="color: green;" class="fa fa-check-circle"></i>&nbsp;Valid E-Pin</span>';
    $('#validate_epin_div > input').on('click', function () {
        $('table#p_scents > tbody > tr > td:nth-child(2) > input').next('span').remove();
        var epin_array = [];
        $('table#p_scents > tbody > tr > td:nth-child(2) > input').each(function () {
            var epin = this.value;
            epin = epin.trim();
            epin = epin.toUpperCase();
            var epin_exists = ($.inArray(epin, epin_array) !== -1);
            if (!epin || epin_exists) {
                $(this).closest('tr').remove();
            } else {
                epin_array.push(epin);
            }
        });
        if (!$.isEmptyObject(epin_array)) {
            var total_amount = $('#total_amount').val();
            var upgrade_user_name = $('#upgrade_user_name').val();
            $.ajax({
                url: $('#base_url').val() + 'repurchase/check_epin_validity',
                type: 'POST',
                data: {
                    pin_array: epin_array,
                    repurchase_amount: total_amount,
                    upgrade_user_name: upgrade_user_name
                },
                dataType: 'json',
                success: function (data) {
                    var amount_reached = 0;
                    var status = true;
                    $.each(data, function (i, v) {
                        if (v.pin == 'nopin') {
                            status = false;
                            $('table#p_scents > tbody > tr:eq(' + i + ')').find('td:nth-child(2) > span').remove();
                            $('table#p_scents > tbody > tr:eq(' + i + ')').find('td:nth-child(2) > input').after(invalid_span);
                        } else {
                            amount_reached += Number(v.epin_used_amount);
                            $('table#p_scents > tbody > tr:eq(' + i + ')').find('td:nth-child(2) > span').remove();
                            $('table#p_scents > tbody > tr:eq(' + i + ')').find('td:nth-child(2) > input').after(valid_span);
                            $('table#p_scents > tbody > tr:eq(' + i + ')').find('td:nth-child(3) > input').val(v.amount);
                            $('table#p_scents > tbody > tr:eq(' + i + ')').find('td:nth-child(4) > input').val(v.balance_amount);
                            $('table#p_scents > tbody > tr:eq(' + i + ')').find('td:nth-child(5) > input').val(v.reg_balance_amount);
                            if (v.reg_balance_amount == 0) {
                                $('table#p_scents > tbody > tr:gt(' + i + ')').remove();
                                return false;
                            }
                        }
                    });
                    $('#epin_total_amount').val(amount_reached);
                    if (status && amount_reached == total_amount) {
                        $('#epin_submit').attr('disabled', false);
                    } else {
                        $('#epin_submit').attr('disabled', true);
                    }
                    if (amount_reached < total_amount && status) {
                        var epin_row = $('#epin_row > table > tbody').contents().clone();
                        $('table#p_scents > tbody').append(epin_row);
                    }
                }
            });
        }
        var epin_row = $('#epin_row > table > tbody').contents().clone();
        var rows = $('table#p_scents > tbody > tr').length;
        if (rows == 0) {
            $('table#p_scents > tbody').append(epin_row);
        }
        var sl_no = 1;
        $('table#p_scents > tbody > tr').each(function () {
            $(this).find('td:first').text(sl_no);
            sl_no++;
        });
    });
});