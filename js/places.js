
$(document).ready(function () {


    $('#form-add-new-places').submit(function (event) {

        $('#form-add-new-places-message').text("");


        if ($('input[name=new-place-name]').val().trim() == '') {
            $('#login_result').text("enter place name");
            $('input[name=new-place-name]').focus();
            return false;
        }


        // get the form data
        var formData = {
            'placename': $('input[name=new-place-name]').val(),
            'placetype': $('#new-place-type').val(),
            'placeaddress': $('input[name=new-place-address]').val(),
            'placelocationlat': $('input[name=new-place-location-latitude]').val(),
            'placelocationlng': $('input[name=new-place-location-Longitude]').val(),
            'placedescription': $('#new-place-desc').val(),
            'placview': $('input[name=new-place-view]:checked', '#form-add-new-places').val()

        };



        $('#new-place-form-icon').html('<span class="fa fa-spinner fa-pulse"></span>')
        $("#form-add-new-places :input").prop("disabled", true);



        var url = sitelink + "/services/newplace.php"; // the script where you handle the form input.
        // process the form

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            dataType: 'json',
            encode: true
        })
                // using the done promise callback
                // {"status":"","message":""}
                .done(function (data) {

                    $('#new-place-form-icon').html('<span class="fa fa-plus"></span>')
                    $("#form-add-new-places :input").prop("disabled", false);

                    if (data.status == "true") {
                        $('#form-add-new-places-message').text("place is inserted");
                        $('#form-add-new-places').reset();
                    } else if (data.status == "false") {
                        $('#form-add-new-places-message').text(data.message);
                    }
                });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});

