
$(document).ready(function () {


    $('#form-add-new-places').submit(function (event) {

        $('#form-add-new-places-message').text("");
        $('.error-mark').text("");


        if ($('#new-place-type').val() == 1000) {
            $('#form-add-new-places-message').text("* select place type");
            $('#form-add-new-places-message').css("color", "red");
            $('#new-place-type-error-mark').text("*");
            $('#new-place-type').focus();
            return false;
        }

        if ($('input[name=new-place-name]').val().trim() == '') {
            $('#form-add-new-places-message').text("* enter place name");
            $('#form-add-new-places-message').css("color", "red");
            $('#new-place-name-error').text("*");
            $('input[name=new-place-name]').focus();
            return false;
        }

        if ($('input[name=new-place-address]').val().trim() == '') {
            $('#form-add-new-places-message').text("* enter place address");
            $('#form-add-new-places-message').css("color", "red");
            $('#new-place-address-error').text("*");
            $('input[name=new-place-address]').focus();
            return false;
        }

        if ($('input[name=new-place-address]').val().trim() == '') {
            $('#form-add-new-places-message').text("* enter place address");
            $('#form-add-new-places-message').css("color", "red");
            $('#new-place-address-error').text("*");
            $('input[name=new-place-address]').focus();
            return false;
        }

        if ($('input[name=new-place-location-latitude]').val().trim() == '') {
            $('#form-add-new-places-message').text("* enter location latitude");
            $('#form-add-new-places-message').css("color", "red");
            $('#new-place-location-h-error').text("*");
            $('input[name=new-place-location-latitude]').focus();
            return false;
        }

        if ($('input[name=new-place-location-Longitude]').val().trim() == '') {
            $('#form-add-new-places-message').text("* enter location Longitude");
            $('#form-add-new-places-message').css("color", "red");
            $('#new-place-location-h-error').text("*");
            $('input[name=new-place-location-Longitude]').focus();
            return false;
        }

        if ($('#new-place-desc').val().trim() == '') {
            $('#form-add-new-places-message').text("* enter description");
            $('#form-add-new-places-message').css("color", "red");
            $('#new-place-description').text("*");
            $('#new-place-desc').focus();
            return false;
        }


        // get the form data
        var formData = {
            'placetype': $('#new-place-type').val(),
            'placename': $('input[name=new-place-name]').val(),
            'placeaddress': $('input[name=new-place-address]').val(),
            'placelocationlat': $('input[name=new-place-location-latitude]').val(),
            'placelocationlng': $('input[name=new-place-location-Longitude]').val(),
            'placedescription': $('#new-place-desc').val(),
            'placview': $('input[name=new-place-view]:checked', '#form-add-new-places').val()

        };



        $('#new-place-form-icon').html('<span class="fa fa-spinner fa-pulse"></span>');
        $("#form-add-new-places :input").prop("disabled", true);



        var url = sitelink + "/services/newplace.php"; // the script where you handle the form input.
        // process the form

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            dataType: 'json',
            encode: true,
            timeout: 1500
        })
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


    $('#form-places-search').submit(function (event) {
        $("#form-places-search-result").html("");

        var Data = {
            'searchkey': $('input[name=places-search-key]').val()
        };

        var url = sitelink + "/services/searchPlaces.php";
        $.ajax({
            type: 'POST',
            url: url,
            data: Data,
            dataType: 'json',
            encode: true
        })
                // using the done promise callback
                // {"status":"","data":""}
                .done(function (data) {
//                console.log(data.data);
                    $('#new-borrow-message').html("");
                    if (data.status == "true") {
                        if (data.data.length === 0) {
                            $('#no-borrow-item-message').text("there no place");
                        } else {
                            var html = "";
                            var newplace = "";
                            $.each(data.data, function (id, object) {
                                newplace = '<div class="col-lg-4 col-md-4">' +
                                        '<div class="panel" style="border: 2px solid #000">' +
                                        '<div class="panel-heading">' +
                                        object.name +
                                        '&nbsp;/&nbsp;' +
                                        object.address +
                                        '</div>' +
                                        '<hr>' +
                                        '<div class="panel-body text-center">' +
                                        '<span class="btn btn-sm btn-primary pull-left">view</span>' +
                                        '<span class="btn btn-sm btn-success ">edit</span>' +
                                        '<span class="btn btn-sm btn-danger pull-right">remove</span>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>'
                                html = html + newplace;
                            });
                            $('#form-places-search-result').html(html);
                            html = null;
                            newplace = null;
                            
                        }


                    } else if (data.status === "false") {

                    }
                });


        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });
    
    
    

});

function placesList(pagenumber){
        
        $("#places-list-table").html("");
        var Data = {
            'pageenumber': pagenumber
        };

        var url = sitelink + "/services/getPlaceListPage.php";
        $.ajax({
            type: 'POST',
            url: url,
            data: Data,
            dataType: 'json',
            encode: true
        })
                // using the done promise callback
                // {"status":"","data":""}
                .done(function (data) {
//                console.log(data.data);
                    $('#new-borrow-message').html("");
                    
                    if (data.status == "true") {
                        if (data.data.length === 0) {
                            $('#no-borrow-item-message').text("there no place");
                        } else {
                            var html = "";
                            var place = "";
                            var num = 26;
                            $.each(data.data, function (id, object) {
                                place =  '<tr>'+
                                '<td>'+num+'</td>'+
                                '<td>'+object.name+'</td>'+
                                '<td>'+object.type+'</td>'+
                                '<td>'+object.address+'</td>'+
                                '<td><span class="btn btn-sm btn-warning">'+
                                        '<span class="fa fa-file-text-o"></span>'+
                                    '</span>'+
                                    '<span class="btn btn-sm btn-primary ">'+
                                        '<span class="fa fa-edit"></span>'+
                                    '</span>'+
                                    '<span class="btn btn-sm btn-danger ">'+
                                        '<span class="fa fa-trash"></span>'+
                                    '</span>'+
                                '</td>'+
                            '</tr>'; 
                                html = html + place;
                                num++;
                            });
                            
                            $('#places-list-table').html(html);
                            html = null;
                            place = null;
                            
                        }


                    } else if (data.status === "false") {

                    }
                });
                
                
                
    }

