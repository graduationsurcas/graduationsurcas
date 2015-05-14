
$(document).ready(function () {

    $("#form-forget-password").submit(function (event) {
        $(".submit-form-spinner").hide();
        var url = sitelink + "/server/servecerequests.php";
        Data = {
                'destination': 'resetadminpass',
                'new-useremail-rest': $('#new-useremail-rest').val()
            };
        
        $.ajax({
            type: 'POST',
                url: url,
                data: Data,
                dataType: 'json',
                encode: true,
            
            beforeSend: function (xhr) {
                $("fa fa-spin fa-cog").show();
                $("#form-forget-password :input").prop("disabled", true);
            },
            success: function (data, textStatus, jqXHR) {
                if (data.status == "true") {
                    $('#login_result').text("Password Reset ");
                } else {
                    $('#login_result').text("Some unknown error happened");
                }
                document.getElementById("form-forget-password").reset();
                $(".submit-form-spinner").hide();
                $("#form-forget-password :input").prop("disabled", false);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#form-forget-password :input").prop("disabled", false);
                $('#login_result').text("Some error happened, " + errorThrown);
            }
        });
        event.preventDefault();
    });
});


