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
            'destination': 'enternewplace',
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

        var url = sitelink + "/server/servecerequests.php"; // the script where you handle the form input.

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            dataType: 'json',
            encode: true,
            timeout: 1500,
            success: function (data, textStatus, jqXHR) {
                $('#new-place-form-icon').html('<span class="fa fa-plus"></span>')
                $("#form-add-new-places :input").prop("disabled", false);
                if (data.status == "true") {
                    $('#form-add-new-places-message').text("place is inserted");
                    document.getElementById("form-add-new-places").reset();
                } else if (data.status == "false") {
                    $('#form-add-new-places-message').text(data.message);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

    placesListFunctions = {
        placesnextpage: function (selectfrom, selectto) {
            Data = {
                'destination': 'placespagelist',
                'selectfrom': selectfrom,
                'selectto': selectto
            };
//            alert("from = "+Data.selectfrom+", to = "+Data.selectto);

            var url = sitelink + "/server/servecerequests.php";

            $.ajax({type: 'POST',
                url: url,
                data: Data,
                dataType: 'json',
                encode: true,
                success: function (data, textStatus, jqXHR) {
                    if (data.status == "true") {
                        $("#places-list-table > tbody").empty();
//                        console.log(data.data);
                        var tdhtml = '';
                        var index = Number(selectfrom);
                        $.each(data.data, function (id, place) {
                            tdhtml = '<tr id="place_list_tr_' + index + '">' +
                                    ' <td>' + index + '</td>' +
                                    ' <td>' + place.name + '</td>' +
                                    ' <td>' + place.type + '</td>' +
                                    '<td>' + place.address + '</td>' +
                                    '<td>' + place.creatdate + '</td>' +
                                    '<td>' +
                                    '<center>' +
                                    '<span data-toggle="modal" data-target="#map_modal" onclick="PlaceOperations.setmapplacelocation(\''+place.locationlat+'\', \''+place.locationlang+'\')" title="open on the map" class="btn btn-sm btn-primary"><i class="fa fa-map-marker"></i></span>' +
                                    '&nbsp;<span onclick="PlaceOperations.setplacedesc(\'' + place.desc + '\')" data-toggle="modal" data-target="#place_desc_modal" title="descrption" class="btn btn-sm btn-warning "><i class="fa fa-file"></i></span>' +
                                    '&nbsp;<span onclick="PlaceOperations.setupdateplacemodelforminfo('+
                                        '\''+place.id+'\','+
                                        '\''+place.placetypeid+'\','+
                                        '\''+place.name+'\','+
                                        '\''+place.address+'\','+
                                        '\''+place.locationlat+'\','+
                                        '\''+place.locationlang+'\','+
                                        '\''+place.desc+'\','+
                                        '\''+place.view+'\''
                                        +')" data-toggle="modal" data-target="#update_place_modal" title="edit place information" class="btn btn-sm btn-success "><i class="fa fa-edit"></i></span>' +
                                    '&nbsp;<span title="remove" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></span>' +
                                    '</center>' +
                                    '</td>' +
                                    '<tr>';


                            $("#places-list-table > tbody:last").append(tdhtml);
                            index++;
                        });

                    } else if (data.status === "false") {
                        alert("error")
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });

        }


    };


    PlaceOperations = {
        setplacedesc: function (desc) {
            $("#place_desc_modal_desc_text").text(desc);
        },
        setupdateplacemodelforminfo: function (id, type, name, address, locstionlat, locstionlong, desc, display) {
            $('.placetypeselection option:eq(' + type + ')').prop('selected', true);
            $('input[id=place-id]').val(id);
            $('input[id=update-place-name]').val(name);
            $('input[id=update-place-address]').val(address);
            $('input[id=update-place-location-latitude]').val(locstionlat);
            $('input[id=update-place-location-Longitude]').val(locstionlong);
            $('#update-place-desc').text(desc);
            $("#radio_" + display).prop("checked", true);
            $("#update_place_modal_form_result").text("");
        },
        setdeletplacemodelforminfo: function (placeid, tr_id) {
            $('input[id=remove-place-id]').val(placeid);
            $('input[id=remove-place-tr-id]').val(tr_id);
        },
        setmapplacelocation: function (lat, lng) {
            $("#set-new-place-coordenate").hide();
            load(lat, lng);

        }
    };
    $('#new-place-form-open-map-modale').click(function () {
        $("#set-new-place-coordenate").show();
    });



    $('#form-places-search').submit(function (event) {
        $("#form-places-search-result").html("");

        var Data = {
            'destination': 'placessearch',
            'searchkey': $('input[name=places-search-key]').val()
        };


        var url = sitelink + "/server/servecerequests.php";
        $.ajax({
            type: 'POST',
            url: url,
            data: Data,
            dataType: 'json',
            encode: true,
            success: function (data, textStatus, jqXHR) {
                $('#new-borrow-message').html("");
//                console.log(data.data);
                if (data.status == "true") {
                    if (data.data.length === 0) {
                        $('#no-borrow-item-message').text("there no place");
                    } else {
                        var html = "";

                        $.each(data.data, function (id, object) {
                            var newplace =
                                    '<div class="col-lg-4 col-md-4">' +
                                    '<div class="panel panel-default">' +
                                    '<div class="panel-heading">' +
                                    '<span class="placessearch-card" id="placessearch-card-placename">' +
                                    object.name +
                                    '</span>' +
                                    '</div>' +
                                    '<div class="panel-body">' +
                                    '<div class="placessearch-card-info">' +
                                    '<span class="placessearch-card-info-title" >' +
                                    'Type&nbsp;:&nbsp;' +
                                    '</span>' +
                                    '<span class="placessearch-card-info-value">' +
                                    object.placetype +
                                    '</span><br>' +
                                    '</div>' +
                                    '<div class="placessearch-card-info">' +
                                    '<span class="placessearch-card-info-title" >' +
                                    'Address&nbsp;:&nbsp;' +
                                    '</span>' +
                                    '<span class="placessearch-card-info-value">' +
                                    object.address +
                                    '</span><br>' +
                                    '</div>' +
                                    '<div class="placessearch-card-info">' +
                                    '<span class="placessearch-card-info-title" >' +
                                    'Add On&nbsp;:&nbsp;' +
                                    '</span>' +
                                    '<span class="placessearch-card-info-value">' +
                                    object.createdate +
                                    '</span><br>' +
                                    ' </div>' +
                                    '</div>' +
                                    '<div class="panel-footer">' +
                                    '<center>' +
                                    '<span title="open on the map" class="btn btn-sm btn-primary"><i class="fa fa-map-marker"></i></span>' +
                                    '&nbsp;<span onclick="PlaceOperations.setplacedesc(\'' + object.desc + '\')" data-toggle="modal" data-target="#place_desc_modal" title="descrption" class="btn btn-sm btn-warning "><i class="fa fa-file"></i></span>' +
                                    '&nbsp;<span data-toggle="modal" data-target="#update_place_modal" title="edit place information" class="btn btn-sm btn-success "><i class="fa fa-edit"></i></span>' +
                                    '&nbsp;<span title="remove" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></span>' +
                                    '</center>' +
                                    '</div>' +
                                    ' </div>' +
                                    '</div>';

                            $(newplace).appendTo('#form-places-search-result');

                        });
//                        $('#form-places-search-result').html(html);
                        html = null;
                        newplace = null;

                    }


                } else if (data.status === "false") {

                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });


        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

    $("#update-place").submit(function (event) {

        var Data = {
            'destination': 'placeupdate',
            'placetype': $('#update-place-type').val(),
            'placeid': $('input[id=place-id]').val(),
            'placename': $('input[id=update-place-name]').val(),
            'placeaddress': $('input[id=update-place-address]').val(),
            'placelocationlat': $('input[id=update-place-location-latitude]').val(),
            'placelocationlng': $('input[id=update-place-location-Longitude]').val(),
            'placedescription': $('#update-place-desc').val(),
            'placview': $('input[name=update-place-view]:checked', '#update-place').val()
        };

        var url = sitelink + "/server/servecerequests.php";
        $.ajax({
            type: 'POST',
            url: url,
            data: Data,
            dataType: 'json',
            encode: true,
            success: function (data, textStatus, jqXHR) {
                if (data.status == "true") {
                    $("#update_place_modal_form_result").text("update successful");
                } else {
                    $("#update_place_modal_form_result").text(data.message);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#update_place_modal_form_result").text(errorThrown);
            }
        });

        event.preventDefault();
    });

    $("#form-remove-place").submit(function (event) {

        var Data = {
            'destination': 'placeremove',
            'placeid': $('input[id=remove-place-id]').val(),
            'pass': $('input[id=remove-place-admin-pass]').val(),
        };

        var url = sitelink + "/server/servecerequests.php";
        $.ajax({
            type: 'POST',
            url: url,
            data: Data,
            dataType: 'json',
            encode: true,
            success: function (data, textStatus, jqXHR) {
                alert(data.data);
                if (data.status == "true") {
                    $("#remove_place_modal_form_result").text("delete successful");
                } else {
                    $("#remove_place_modal_form_result").text(data.message);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
        event.preventDefault();
    });


    $('#set-new-place-coordenate').click(function () {
        //        for a form on the new place page 
        $('input[id=new-place-location-h]').val($("#lat").text());
        $('input[id=new-place-location-v]').val($("#lng").text());
        
//        for a form on the modale of update place 
        $('input[id=update-place-location-latitude]').val($("#lat").text());
        $('input[id=update-place-location-Longitude').val($("#lng").text());
        
    });


});
