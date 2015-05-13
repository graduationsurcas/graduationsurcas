
$(document).ready(function () {

    $("#form-user-profile").submit(function (event) {
        $(".submit-form-spinner").hide();
        var url = sitelink + "/server/servecerequests.php";
        Data = {
                'destination': 'updateprofile',
                'user-profile-name': $('input[name=user-profile-name]').val(),
                 'user-profile-name': $('input[name=user-profile-name]').val(),
                'user-profile-email': $('input[name=user-profile-email]').val(),
                'user-profile-password-new': $('input[name=user-profile-password-new]').val(),
                                'user-profile-password-old': $('input[name=user-profile-password-old]').val()

            };
           
           
           
               if($('#user-profile-password-new').val()!=$('#user-profile-password-new-repeat').val()){
               $('#user_profile_result').text("Password not match ");
           }
           else {
           
        $.ajax({
            type: 'POST',
                url: url,
                data: Data,
                dataType: 'json',
                encode: true,
            
            beforeSend: function (xhr) {
               
                $("fa fa-spin fa-cog").show();
                $("#form-user-profile :input").prop("disabled", true);
            },
            success: function (data, textStatus, jqXHR) {
               
                if (data.status == "true") {
                    $('#user_profile_result').text("Password Reset ");
                    $('#user_profile_result').css("color","green");
                } else {
                    $('#user_profile_result').css("color","red");
                    $('#user_profile_result').text(data.message);
                }
                document.getElementById("form-user-profile").reset();
                $(".submit-form-spinner").hide();
                $("#form-user-profile :input").prop("disabled", false);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#form-user-profile :input").prop("disabled", false);
                 $('#user_profile_result').css("color","red");
                $('#user_profile_result').text("Some error happened, " + errorThrown);
            }
        });
        }
        event.preventDefault();
    });
});


