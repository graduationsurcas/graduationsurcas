/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// magic.js
$(document).ready(function () {

    // process the form
    $('#form-forgetpassword').submit(function (event) {


        var emailFilter = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
        if ($('input[name=useremail]').val().trim() == '') {
            $('#login_result').text("enter your email");
            $('input[name=useremail]').focus();
            return false;
        }
        else if (!emailFilter.test($('input[name=useremail]').val().trim())) {
            $('#login_result').text('Please enter a valid e-mail address.');
            $('input[name=userpassword]').focus();
            return false;
        }
       

        // get the form data
        var formData = {
            'useremail': $('input[name=useremail]').val()
        };


        $('#login_result').html('<i class="fa fa-spinner fa-pulse fa-3x"></i>')

        $('input[name=userpassword]').attr('disabled', 'disabled');
        $('input[name=useremail]').attr('disabled', 'disabled');
        $('input[type="submit"]').attr('disabled', 'disabled');
        var url = sitelink + "/server/passwordrequest.php"; // the script where you handle the form input.
        // process the form
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            dataType: "json",
            encode: true,
            success: function (data, textStatus, jqXHR) {
                
                    $('#login_result').text('Sucess reset');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }

        });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});


