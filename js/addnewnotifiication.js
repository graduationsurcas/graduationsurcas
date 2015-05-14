
$(document).ready(function () {

    $("#form-new-notification").submit(function (event) {
        $(".submit-form-spinner").hide();
        var url = sitelink + "/server/servecerequests.php";
        Data = {
                'destination': 'addnewnotification',
                'add-new-notification': $('#add-new-notification').val()
            };
        $.ajax({
            type: 'POST',
                url: url,
                data: Data,
                dataType: 'json',
                encode: true,
            
            beforeSend: function (xhr) {
                $("fa fa-spin fa-cog").show();
                $("#form-new-notification :input").prop("disabled", true);
            },
            success: function (data, textStatus, jqXHR) {
                if (data.status == "true") {
                    $('#form-add-new-places-message').css("color","green");
                    $('#form-add-new-places-message').text("Notification Added ");
                } else {
                    $('#form-add-new-places-message').text("Some unknown error happened");
                }
                document.getElementById("form-new-notification").reset();
                $(".submit-form-spinner").hide();
                $("#form-new-notification :input").prop("disabled", false);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#form-new-notification :input").prop("disabled", false);
                $('#form-add-new-places-message').text("Some error happened, " + errorThrown);
            }
        });
        event.preventDefault();
    });
});


