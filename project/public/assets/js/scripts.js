var rootpath = "/";
var no_access_message = "You don't have permission to access this feature.";
var record_added_message = "Record is added successfully.";
var record_updated_message = "Record is updated successfully.";
var record_added_error_message = "Error Sorry record not added.";
var record_update_error_message = "Error Sorry record not update.";
var email_already_exist_error_message = "Email already exist."; 
var alphabets_error_message = 'Please enter alphabets only';

function message_alert(id, message)
{
    message_container('message_'+id+'_message', 'danger', message);
    $('#'+id).css("background-color", "pink");
    $('#'+id).css('border-color', '#ff0000');
    $('#'+id).focus();

    $('#'+id).keyup(function() {
        $('#message_'+id+'_message').fadeOut("slow");
        $('#'+id).css("background-color", "white");
        $('#'+id).css('border-color', '#ccc');
    });

    $('#'+id).change(function() {
        $('#message_'+id+'_message').fadeOut("slow");
        $('#'+id).css("background-color", "white");
        $('#'+id).css('border-color', '#ccc');
    });

    $('input[type="checkbox"]').click(function(){
        $('#message_'+id+'_message').fadeOut("slow");
        $('#'+id).css("background-color", "white");
        $('#'+id).css('border-color', '#ccc');
    });
}

function allErrorMsg(msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display','block');
    $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
    $('html, body').animate({
        scrollTop: $(".print-error-msg").offset().top
    }, 1000);
}

function message_container(container, alertCls, message) {    
    $("#" + container).removeClass('alert alert-danger alert alert-success').addClass('alert alert-' + alertCls).text(message).show();
}

function show_message(message_container, alertCls, message) {
    $("#" + message_container).removeClass('alert alert-danger alert alert-success').addClass('alert alert-' + alertCls).text(message).show();
    $('html, body').animate({
        scrollTop: $("#" + message_container).offset().top
    }, 1000);
    setTimeout(
        function() {
            $("#" + message_container).hide();
        }, 2000
    );
}

function show_global_message(message_container, alertCls, message) {
    $("#" + message_container).removeClass('alert alert-danger alert alert-success').addClass('alert alert-' + alertCls).text(message).show();
    setTimeout(
        function() {
            $("#" + message_container).hide();
        }, 3000
    );
}

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}
function isValidAlphabaticText(e)
{
    var pattern = new RegExp("^[a-zA-Z \s]+$");
    return pattern.test(e);
}
function isValidNumaricValue(e) {
    var pattern = new RegExp(/^\-?([0-9]+(\.[0-9]+)?|Infinity)$/);
    return pattern.test(e);
}
function isValidNonSpecialCharacterValue(e) {
    var pattern = new RegExp(/^[A-Za-z0-9 ]+$/);
    return pattern.test(e);
}

function isValidCNICValue(e) {
    var pattern = new RegExp(/\d{5}-\d{7}-\d/);
    return pattern.test(e);
}


function check_all_zeros(x, value) {
    var parts = x.toString().split("-");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, "");
    parts = parts.join("");
    return (parts == value) ? true : false;
}
function replace_string(x, s, rs) {
    var parts = x.toString().split(s);
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, rs);
    return parts.join(rs);
}

function replace_string2(x, s, rs) {
    var parts = x.toString().split(s);
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, rs);
    parts = parts.join(rs);

    parts = parts.toString().split("_");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, rs);
    return parts.join(rs);
}


/**************** bootstrap maxlength display ***********************/
function maxlength_fields(e)
{   
    if(e != undefined || e.length > 0) {
        e.forEach(function(entry) {
            $('input#'+entry).maxlength({
                showOnReady: false,
                alwaysShow: true,
                threshold: 10,
                warningClass: "badge badge-success",
                limitReachedClass: "badge badge-danger"
            });

            $('textarea#'+entry).maxlength({
                showOnReady: false,
                alwaysShow: true,
                threshold: 10,
                warningClass: "badge badge-success",
                limitReachedClass: "badge badge-danger"
            });
        });
    }
}



/********************* Global Trigger Change Status *********************/
$(document).on("click", ".change-status", function(e)
{
    e.preventDefault();
    let status_id = $(this).data('id');
    let urllink = $(this).data('route');
    let previous_status = $(this).data('value');
    let status_info = (previous_status == 1) ? 0 : 1;
    $.ajax({
        url: urllink,
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: status_id,
            statusinfo: status_info
        },
        beforeSend: function() {
            $("#status_section_" + status_id).show();
            $("#loader_" + status_id).show();
        },
        success: function(data) {
            if (data['success']) {              
                update_status_flag(previous_status, status_id, urllink);
                $("#status_message_" + status_id).show();  
            } else if (data['error']) {
                alert(data['error']);
            } else {
                alert('Oops Something went wrong!!');
            }
        },
        error: function(data) {
            alert(data.responseText);
        },
        complete: function(data) {
            setTimeout(function() {
                $("#status_message_" + status_id).hide();
                $("#status_section_" + status_id).hide();
                $("#loader_" + status_id).hide();
            }, 2000);
        }
    });
    return false;
    
});
function update_status_flag(previous_status, id, route) 
{
    var current_status = '';
    if (previous_status == 1) {
        current_status = '<button class="btn btn-danger btn-sm change-status" data-id="' + id + '" data-value = "0" data-route="' + route + '" style="cursor: pointer;">Inactive</button>';
    } else {
        current_status = '<button class="btn btn-success btn-sm change-status" data-id="' + id + '" data-value = "1" data-route="' + route + '" style="cursor: pointer;">Active</button>';
    }
    $("#status_container_" + id).html(current_status);
}



/********************* Global form loading function *********************/
function load_form(urlpath, containerid, id)
{
    $.ajax({
        url: urlpath, 
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: { 
            id: id
        },
        beforeSend: function() {
            $(".overlay").show();
        }, 
        success: function(data) 
        { 
            $("#"+containerid).html(data);
        },
        error: function(data) 
        { 
            alert("Error: Data is not loaded. Please close the popup and try again.");
            return false; 
        },
        complete: function(data) {
            $(".overlay").hide();
        }
    });
}

/********************** Delete Records ***********************/
$(document).on('click', '.delete-record', function(e)
{
    e.preventDefault();
    let record_id = $(this).data('id');
    let urllink = $(this).data('route');
    if(confirm("Are you sure you want to Delete this record?"))
    {
        $.ajax({
            url: urllink,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: record_id
            },
            beforeSend: function() {
                $(".overlay").show();
            },
            success: function(data) {
                if (data == 1) {
                    $("#" +record_id).closest('tr').css('background','tomato');
                    $("#" +record_id).closest('tr').fadeOut(800,function(){
                        $(this).remove();
                        $('#table1').DataTable().ajax.reload();W
                    });                    
                    show_global_message('alert_messages', 'success', 'Record is deleted successfully.');
                } else if (data == 0) {
                    show_global_message('alert_messages', 'danger', "Error Sorry record not deleted.");
                } else if (data == 3) {
                    show_global_message('alert_messages', 'danger', no_access_message);
                }  
            },
            error: function(data) {
                alert("Error: Data is not deleted. Please try again.");
            },
            complete: function(data) {
                $("html, body").animate( {
                    scrollTop : 0
                }, 1000); 
                $(".overlay").show();
            }
        });
    }
    else
    {
        return false;
    }
}); 
