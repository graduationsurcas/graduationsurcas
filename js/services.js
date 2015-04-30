$(document).ready(function () {
    servicesFunctions = {
        setserviceprovidermodalinfo: function (name, email, phone,
                createdate, pevaluation, nevaluation, status) {
            $("#serviceprovider_info_name").text(name);
            $("#serviceprovider_info_email").text(email);
            $("#serviceprovider_info_phone").text(phone);
            $("#serviceprovider_info_createdate").text(createdate);
            $("#serviceprovider_info_positiveevaluation").text(pevaluation);
            $("#serviceprovider_info_negativeevaluation").text(nevaluation);
            $("#serviceprovider_info_status").text(status);
        },
        setserviceproviderupdatemodalinfo: function (id, name, email, phone, status) {
            $("#update-serviceproviderinfo-id").val(id);
            $("#update-serviceproviderinfo-name").val(name);
            $("#update-serviceproviderinfo-email").val(email);
            $("#update-serviceproviderinfo-phone").val(phone);
            $("#update-serviceproviderinfo-status").val(status);
            $("#update-serviceproviderinfo-result").text("");
            $("#update-serviceproviderinfo-password-result").text("");
            $('input[id=update-serviceproviderinfo-password-pass]').val("");
            $('input[id=update-serviceproviderinfo-password-repass]').val("");

        },
        setremovesetserviceprovidermodalinf: function (id, trid) {
            $("#remove-serviceprovider-id").val(id);
            $("#remove-serviceprovider-tr-id").val(trid);
            $('input[id=remove-serviceprovider-admin-pass]').val("");
            $("#remove_serviceprovider_modal_form_result").text("");
        },
        serviceprovidernextpage: function (selectfrom, selectamount) {
            Data = {
                'destination': 'serviceproviderslist',
                'selectfrom': selectfrom,
                'selectamount': selectamount
            };
//            alert("from = "+Data.selectfrom+", to = "+Data.selectto);

            var url = sitelink + "/server/servecerequests.php";

            $.ajax({
                type: 'POST',
                url: url,
                data: Data,
                dataType: 'json',
                encode: true,
                success: function (data, textStatus, jqXHR) {
                    if (data.status == "true") {
                        $("#serviceproviders-list-table > tbody").empty();
//                        console.log(data.data);
                        var tdhtml = '';
                        var index = Number(selectfrom);
                        $.each(data.data, function (id, userprovider) {
                            var st = (userprovider.blockstatus == "true") ? "block" : "active";
                            tdhtml =
                                    '<tr id="serviceprovider_list_tr_' + index + '">' +
                                    '<td>' + (index + 1) + '</td>' +
                                    '<td>' + userprovider.name + '</td>' +
                                    '<td>' + userprovider.createdate + '</td>' +
                                    '<td>' + st + '</td>' +
                                    '<td>' +
                                    '<center>' +
                                    '<span onclick="servicesFunctions.setserviceprovidermodalinfo(' +
                                    '\'' + userprovider.name + '\' ,' +
                                    '\'' + userprovider.email + '\' ,' +
                                    '\'' + userprovider.phone + '\' ,' +
                                    '\'' + userprovider.createdate + '\' ,' +
                                    '\'' + userprovider.positiveevaluation + '\' ,' +
                                    '\'' + userprovider.negativeevaluation + '\' ,' +
                                    '\'' + st + '\' ' +
                                    ')" data-toggle="modal" data-target="#serviceprovider_info_modal" class="btn btn-warning btn-sm">' +
                                    '<i class="fa fa-info-circle"></i>' +
                                    '</span>&nbsp;' +
                                    '<span onclick="servicesFunctions.setserviceproviderupdatemodalinfo(' +
                                    '\'' + userprovider.id + '\' ,' +
                                    '\'' + userprovider.name + '\' ,' +
                                    '\'' + userprovider.email + '\' ,' +
                                    '\'' + userprovider.phone + '\' ,' +
                                    '\'' + st + '\' ' +
                                    ')" data-toggle="modal"' +
                                    'data-target="#update_serviceproviderinfo_modal"' +
                                    'class="btn btn-success btn-sm">' +
                                    '<i class="fa fa-edit"></i>' +
                                    '</span>&nbsp;' +
                                    '<span onclick="servicesFunctions.setremovesetserviceprovidermodalinf(' +
                                    '\'' + userprovider.id + '\' ,' +
                                    '\'' + index + '\' ' +
                                    ')"' +
                                    'data-toggle="modal" data-target="#remove_serviceprovider_modal" class="btn btn-danger btn-sm">' +
                                    '<i class="fa fa-trash"></i>' +
                                    '</span>' +
                                    '</center>' +
                                    '</td>' +
                                    '</tr>';


                            $("#serviceproviders-list-table > tbody:last").append(tdhtml);
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

    $("#form-remove-serviceprovider").submit(function (event) {
        var Data = {
            'destination': 'serviceproviderremove',
            'serviceproviderid': $("#remove-serviceprovider-id").val(),
            'pass': $('input[id=remove-serviceprovider-admin-pass]').val()
        };
        event.preventDefault();
        var trid = $("#remove-serviceprovider-tr-id").val();

        var url = sitelink + "/server/servecerequests.php";
        $.ajax({
            type: 'POST',
            url: url,
            data: Data,
            dataType: 'json',
            encode: true,
            beforeSend: function (xhr) {
                $("#remove_serviceprovider_modal_form_result").text("");
                $('#remove_serviceprovider_modal_form_result').html('<span class="fa fa-spinner fa-pulse"></span>');
                $("#form-remove-serviceprovider :input").prop("disabled", true);
                $("#remove_serviceprovider_modal_form_result").css("color", "green");
            },
            complete: function (jqXHR, textStatus) {
                $("#form-remove-serviceprovider :input").prop("disabled", false);
            },
            success: function (data, textStatus, jqXHR) {

                if (data.status == "true") {
                    $('input[id=remove-serviceprovider-admin-pass]').val("");
                    $("#remove_serviceprovider_modal_form_result").css("color", "green");
                    $("#remove_serviceprovider_modal_form_result").text("delete successful");
                    $("#serviceprovider_list_tr_" + trid).toggle();
                } else {
                    $("#remove_serviceprovider_modal_form_result").css("color", "red");
                    $("#remove_serviceprovider_modal_form_result").text(data.message);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#remove_serviceprovider_modal_form_result").css("color", "red");
                $("#remove_serviceprovider_modal_form_result").text("Error, try again");
            }
        });
    });


    $("#update-serviceproviderinfo").submit(function (event) {

        event.preventDefault();

        var Data = {
            'destination': 'serviceproviderupdate',
            'id': $('input[id=update-serviceproviderinfo-id]').val(),
            'name': $('input[id=update-serviceproviderinfo-name]').val(),
            'phone': $('input[id=update-serviceproviderinfo-phone]').val(),
            'email': $('input[id=update-serviceproviderinfo-email]').val(),
            'accountstatus': $('#update-serviceproviderinfo-status').val()
        };


        var url = sitelink + "/server/servecerequests.php";
        $.ajax({
            type: 'POST',
            url: url,
            data: Data,
            dataType: 'json',
            encode: true,
            beforeSend: function (xhr) {
                $("#update-serviceproviderinfo-result").text("");
                $('#update-serviceproviderinfo-result').html('<span class="fa fa-spinner fa-pulse"></span>');
                $("#update-serviceproviderinfo :input").prop("disabled", true);
                $("#update-serviceproviderinfo-result").css("color", "green");
            },
            complete: function (jqXHR, textStatus) {
                $("#update-serviceproviderinfo :input").prop("disabled", false);
            },
            success: function (data, textStatus, jqXHR) {
                if (data.status == "true") {
                    $("#update-serviceproviderinfo-result").text("update successful");
                } else {
                    $("#update-serviceproviderinfo-result").css("color", "red");
                    $("#update-serviceproviderinfo-result").text("update is not complat, try again");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#update-serviceproviderinfo-result").css("color", "red");
                $("#update-serviceproviderinfo-result").text("Error, try again");
            }
        });

    });

    $("#update-serviceproviderinfo-password").submit(function (event) {

        event.preventDefault();
        $('#update-serviceproviderinfo-password-result').text('');

        var pass = $('input[id=update-serviceproviderinfo-password-pass]').val();
        var repass = $('input[id=update-serviceproviderinfo-password-repass]').val();

        if (pass.trim() === null || pass.trim() === '') {
            $('#update-serviceproviderinfo-password-result').text('enter user password');
            $('#update-serviceproviderinfo-password-result').css("color", "red");
            $("#update-serviceproviderinfo-password-pass").focus();

            return false;
        }
        if (pass.trim().length < 8) {
            $('#update-serviceproviderinfo-password-result').text('password must be more than 8 letters');
            $('#update-serviceproviderinfo-password-result').css("color", "red");
            $('#updateuser_site_result').css("font-size", "17px");
            $("#update-serviceproviderinfo-password-pass").focus();
            return false;
        }
        if (pass.trim() !== repass.trim()) {
            $('#update-serviceproviderinfo-password-result').text('password is not same');
            $('#update-serviceproviderinfo-password-result').css("color", "red");
            $('#updateuser_site_result').css("font-size", "17px");
            $("#update-serviceproviderinfo-password-repass").focus();
            return false;
        }

        var Data = {
            'destination': 'serviceproviderupdatepass',
            'id': $('input[id=update-serviceproviderinfo-id]').val(),
            'pass': pass
        };


        var url = sitelink + "/server/servecerequests.php";
        $.ajax({
            type: 'POST',
            url: url,
            data: Data,
            dataType: 'json',
            encode: true,
            beforeSend: function (xhr) {
                $("#update-serviceproviderinfo-password-result").text("");
                $('#update-serviceproviderinfo-password-result').html('<span class="fa fa-spinner fa-pulse"></span>');
                $("#update-serviceproviderinfo-password :input").prop("disabled", true);
                $("#update-serviceproviderinfo-password-result").css("color", "green");
            },
            complete: function (jqXHR, textStatus) {
                $("#update-serviceproviderinfo-password :input").prop("disabled", false);
            },
            success: function (data, textStatus, jqXHR) {
                if (data.status == "true") {
                    $("#update-serviceproviderinfo-password-result").text("update password successful");
                } else {
                    $("#update-serviceproviderinfo-password-result").css("color", "red");
                    $("#update-serviceproviderinfo-password-result").text("update password is not complat, try again");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#update-serviceproviderinfo-password-result").css("color", "red");
                $("#update-serviceproviderinfo-password-result").text("Error, try again");
            }
        });


    });


    addnewservicesrequest = {
        setmapplacelocation: function (lat, lng) {
            $("#set-new-place-coordenate").hide();
            load(lat, lng);

        },
        setservicerequestmodelinf : function (title, provider, description, date){
            $("#servicerequest_info_modal_title").text(title);
            $("#servicerequest_info_modal_provider").text(provider);
            $("#servicerequest_info_modal_description").text(description);
            $("#servicerequest_info_modal_createdate").text(date);
        },
        setprofiderinfomodale: function (id) {
            var Data = {
                'destination': 'getserviseproviderinfo',
                'providerid': id
            };


            var url = sitelink + "/server/servecerequests.php";
            $.ajax({
                type: 'POST',
                url: url,
                data: Data,
                dataType: 'json',
                encode: true,
                beforeSend: function (xhr) {
                },
                complete: function (jqXHR, textStatus) {
                },
                success: function (data, textStatus, jqXHR) {
                    if (data.status == "true") {
                        $("#serviceprovider_info_name").text(data.data[0].name);
                        $("#serviceprovider_info_email").text(data.data[0].email);
                        $("#serviceprovider_info_phone").text(data.data[0].phone);
                        $("#serviceprovider_info_createdate").text(data.data[0].createdate);
                        $("#serviceprovider_info_positiveevaluation").text(data.data[0].positiveevaluation);
                        $("#serviceprovider_info_negativeevaluation").text(data.data[0].negativeevaluation);
                        var st = (data.data[0].blockstatus === "false")? "active" : "block";
                        $("#serviceprovider_info_status").text(st);
                    } else {
                    
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                
                }
            });

        }
    };


});


