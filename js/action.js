
// By default, modal will stay on screen even when button
// was triggered or an event was called.
//--   FORM will stay on screen even when button was clicked --
$(document).on('submit','#my-form',function(event){    
    event.preventDefault()
    var formData = $(this).serialize();
    $.ajax({
        url: "", // some php
        data: formData,
        datatype: "json",
        type: "POST",
        success: function(data) {}
   });
});


$(document).on('submit','#my-rform',function(event){    
    event.preventDefault()
    var formData = $(this).serialize();
    $.ajax({
        url: "", // some php
        data: formData,
        datatype: "json",
        type: "POST",
        success: function(data) {}
   });
});


//clear error messages onclick
function _clearOnClick()
{
    $('#username').focus(); //set autofocus on username input field
    $('#error').html(''); //clear error messages from login
    $('#r_error').html(''); //clear all error message in register
}

//Login button was triggerd.
//action for authentication 
function _loginScript(){
        $('#username').focus(); //set autofocus on username input field
        var username = $('#username').val();
        var password = $('#password').val();
        if(username != '' || password != '' ){
                $.ajax({
                method: "POST",
                url: "../php_pages/action.php",
                data: {username:username, password:password},
                success: function(data){
                    if(data == "no")
                    {   
                        $('#error').html('Your USERNAME or PASSWORD is incorrect!');
                        var form = document.getElementById("my-form");
                        form.reset();
                    } 
                    else 
                    {
                        $('#loginModal').hide();
                        window.location.href = "index.php",true;
                    }
                }
            });
        }
        else 
        {
            $('#error').html('Please fill all fields');
        }
}
//-------------REGISTER-------------------------------//
//====================================================/
        //Register button was triggerd.
        //action for registering values for th user 
function _registerUser(){   
        var r_username = $('#r_username').val();
        var r_password = $('#r_password').val();
        var r_type = $('#r_type').val();
        var r_auth = $('#r_auth').val();
        //alert('dito ako');
        if(r_username != '' || r_password != '' || r_type != '' || r_auth !='' ){
            $.ajax({
            method: "POST",
            url: "../php_pages/action.php",
            data: {r_username:r_username, r_password:r_password, r_type:r_type, r_auth:r_auth},
            success: function(reg_data){
                if(reg_data == "no")
                {   
                    $("#r_error").html("Your USERNAME or PASSWORD is incorrect!");
                    var form = document.getElementById("my-rform");
                    form.reset();
                } 
                else 
                {
                    //window.location.href = "index.php",true;
                    //alert('asan ka?')
                }
            }
            });
        }
        else 
        {
            $('#r_error').html('Please fill all fields');
        }
}