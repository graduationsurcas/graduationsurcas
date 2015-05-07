
$(document).ready(function () {

    var singleitemcommentscount = 0;

   


    $("#form_add_new_item").submit(function (event) {
        $(".submit-form-spinner").hide();
        var url = sitelink + "/server/servecerequests.php";
        $.ajax({
            url: url,
            type: 'POST',
            xhr: function () {
                var myXhr = $.ajaxSettings.xhr();
                return myXhr;
            },
            beforeSend: function (xhr) {
                $("#new_item_form_spinner").show();
                $('#form-add-new-item-message').text("item is inserted");
                $("#form_add_new_item :input").prop("disabled", true);
            },
            success: function (data, textStatus, jqXHR) {
                if (data.status == "true") {
                    $('#form-add-new-item-message').text("item is inserted");
                } else {
                    $('#form-add-new-item-message').text("Some unknown error happened");
                }
                document.getElementById("form_add_new_item").reset();
                $(".submit-form-spinner").hide();
                $("#form_add_new_item :input").prop("disabled", false);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#form-add-new-item-message').text("Some error happened, " + errorThrown);
            },
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false
        });
        event.preventDefault();
    });

    itemsListFunctions = {
        itemsnextpage: function (selectfrom, selectamount) {
            Data = {
                'destination': 'itemspagelist',
                'selectfrom': selectfrom,
                'selectamount': selectamount
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
                        $("#items-list-table > tbody").empty();
                        var tdhtml = '';
                        var index = Number(selectfrom);
                        $.each(data.data, function (id, item) {
//                            "omantourismguide~item~itemid~itemname"
                            var itemqrdata = "omantourismguide~item~"+ item.itemid
                                    +"~"+ item.itemname +" "+ item.itemtype;
                            var description = item.itemdesc;
                            description = description.replace(/'/g, '\'');
                            tdhtml = '<tr id="item_list_tr_' + index + '">' +
                                    ' <td>' + (index + 1) + '</td>' +
                                    '<td>' + item.itemname + '</td>' +
                                    '<td>' + item.itemtype + '</td>' +
                                    '<td>' + item.itemplace + '</td>' +
                                    '<td>' + item.itemadddate + '</td>' +
                                    '<td>' +
                                    '<center>' +
                                    ' <span data-toggle="modal" data-target="#qr_modal"' +
                                    'onclick="itemsListFunctions.setItemQrModal(\'' + itemqrdata + '\', \'' + item.itemname + '\')" title="QR" ' +
                                    'class="qr-button btn btn-sm btn-default"><i class="fa fa-qrcode"></i></span>' +
                                    '&nbsp;<span onclick="itemsListFunctions.setdescriptionmodel(\'' + description + '\')" data-toggle="modal" data-target="#place_desc_modal" class="btn btn-warning btn-sm">' +
                                    '<i class="fa fa-file-text"></i>' +
                                    '</span>' +
                                    '&nbsp;<span onclick="itemcommentfunction.setsingleitemcomment(\'' + item.itemid + '\', 25, 0, 1)"  data-toggle="modal" data-target="#item_comments_list_modal" class="btn btn-primary btn-sm">' +
                                    '<i class="fa fa-comments"></i>' +
                                    '</span>' +
                                    '&nbsp;<span onclick="itemsListFunctions.itemsimagegallery(' + item.itemid + ')" ' +
                                    'data-toggle="modal" data-target="#item_images_modal"' +
                                    'class="btn btn-default btn-sm">' +
                                    ' <i class="fa fa-image"></i>' +
                                    '</span>' +
                                    '&nbsp;<span onclick="itemsListFunctions.setupdateitemmodel(' +
                                    '\'' + item.itemid + '\',' +
                                    '\'' + item.itemplaceid + '\',' +
                                    '\'' + item.itemtypeid + '\',' +
                                    '\'' + item.itemname + '\',' +
                                    '\'' + description + '\',' +
                                    '\'' + item.itemstatusview + '\'' +
                                    ')" data-toggle="modal"' +
                                    ' data-target="#update_item_modal"' +
                                    'class="btn btn-success btn-sm">' +
                                    ' <i class="fa fa-edit"></i>' +
                                    '</span>' +
                                    ' &nbsp;<span onclick="itemsListFunctions.setremovemodel(\'' + item.itemid + '\',' +
                                    ' \'' + index + '\' )" data-toggle="modal" data-target="#remove_item_modal"' +
                                    ' class="btn btn-danger btn-sm">' +
                                    ' <i class="fa fa-trash"></i>' +
                                    '</span>' +
                                    '</center>' +
                                    '</td>' +
                                    '</tr>';

                            $("#items-list-table > tbody:last").append(tdhtml);
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

        },
        setItemQrModal: function (itemdata, itemname) {
            var imageinfo = 'qrdata=' + itemdata;
            $('#qr_modal_image').attr("src", sitelink + '/qr/QRcreator.php?'+imageinfo);
            var imageinfodownload = 'qrdata=' + itemdata + '&save=true&qrtitle='+itemname;
            $('#qr_event_modal_download').attr("href", sitelink + '/qr/QRcreator.php?'+imageinfodownload);
            $('#QR_title').text(" " + itemname);
        },
        itemsimagegallery: function (itemid) {
            Data = {
                'destination': 'itemimages',
                'itemid': itemid
            };
            var url = sitelink + "/server/servecerequests.php";
            $.ajax({
                type: 'POST',
                url: url,
                data: Data,
                dataType: 'json',
                encode: true,
                beforeSend: function (xhr) {
                    $(".cont-slider").empty();
                    $(".carousel-indicators").empty();
                },
                success: function (data, textStatus, jqXHR) {


                    if (true) {
                        var imagehtml = '';
                        var smallimagehtml = '';
                        var active = "active";
                        var index = 0;
                        $.each(data, function (id, item) {
                            active = (index == 0) ? active : "";
                            imagehtml = imagehtml +
                                    '<div class="' + active + ' item"><img  alt="" title="" src="../uploadsimages/' + item.image_title + '"></div>';

                            smallimagehtml = smallimagehtml +
                                    '<li class="' + active + '" data-slide-to="' + index + '" data-target="#article-photo-carousel">' +
                                    '<img alt="" src="' + item.image_path + item.image_title + '">' +
                                    '</li>' +
                                    index++;
                        });
                        $(".cont-slider").html(imagehtml);
                        $(".carousel-indicators").html(smallimagehtml);
                    } else {
                        $("#item_images_place").html("<center><h2>Some unknown error happened</h2></center>");
                        $("#item_images_place_indicators").html("");
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $("#item_images_place").html("<center><h2>Some error happened</h2></center>");
                    $("#item_images_place_indicators").html("");
                }
            });
        },
        setupdateitemmodel: function (itemid, placeid, itemtype, itemname, description, display) {
            $('#update_item_id').val(itemid);
            $('#update_item_place').val(placeid);
            $('#update_item_type').val(itemtype);
            $('#update_item_description').text(description);
            $('input[id=update_item_name]').val(itemname);
            $("#radio_item_" + display).prop("checked", true);
            $("#update_item_modal_form_result").text("");
        },
        setdescriptionmodel: function (desc) {
            $("#desc_modal_desc_text").text(desc);
        },
        setremovemodel: function (itemid, trid) {
            $('input[id=remove-item-id]').val(itemid);
            $('input[id=remove-item-tr-id]').val(trid);
            $('input[id=remove-item-admin-pass]').val("");
            $('#remove_item_modal_form_result').text("");
        }

    };


    $("#update-item").submit(function (event) {
        var description = $('#update_item_description').val();
        description = description.replace(/'/g, '\'');

        var Data = {
            'destination': 'itemupdate',
            'itemtype': $('#update_item_type').val(),
            'itemname': $('input[id=update_item_name]').val(),
            'itemid': $('input[id=update_item_id]').val(),
            'itemdescription': description,
            'itemview': $('input[name=update_item_view]:checked', '#update-item').val()
        };

        var url = sitelink + "/server/servecerequests.php";
        $.ajax({
            type: 'POST',
            url: url,
            data: Data,
            dataType: 'json',
            encode: true,
            success: function (data, textStatus, jqXHR) {
                console.log(data);
                if (data.status == "true") {
                    $("#update_item_modal_form_result").text("update successful");
                } else {
                    $("#update_item_modal_form_result").text(data.message);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#update_item_modal_form_result").text(errorThrown);
            }
        });

        event.preventDefault();
    });

    $("#form-remove-item").submit(function (event) {
        var Data = {
            'destination': 'itemremove',
            'itemid': $('input[id=remove-item-id]').val(),
            'pass': $('input[id=remove-item-admin-pass]').val()
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
                    var trid = $('input[id=remove-item-tr-id]').val();
                    $('input[id=remove-item-admin-pass]').val("");
                    $("#remove_item_modal_form_result").css("color", "green");
                    $("#remove_item_modal_form_result").text("delete successful");
                    $("#item_list_tr_" + trid).toggle();
                    $("#item_list_search_" + trid).toggle();
                } else {
                    $("#remove_item_modal_form_result").css("color", "red");
                    $("#remove_item_modal_form_result").text(data.message);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
                alert(errorThrown);
            }
        });
        event.preventDefault();
    });

    $('#form-item-search').submit(function (event) {
        $("#form-item-search-result").html("");

        var Data = {
            'destination': 'itemssearch',
            'searchkey': $('input[name=items-search-key]').val()
        };


        var url = sitelink + "/server/servecerequests.php";
        $.ajax({
            type: 'POST',
            url: url,
            data: Data,
            dataType: 'json',
            encode: true,
            success: function (data, textStatus, jqXHR) {
                $('#form-item-search-message').html("");
//                console.log(data.data);
                if (data.status == "true") {
                    if (data.data.length === 0) {
                        $('#form-item-search-message').text("there no item like " + Data.searchkey);
                    } else {
                        var index = 1;
                        $.each(data.data, function (id, item) {
//                            console.log(item.itemtype)
                            var description = item.itemdescr;
                            description = description.replace(/'/g, '\'');
                            var itemqrdata = "omantourismguide~item~"+ item.itemid
                                    +"~"+ item.itemname +" "+ item.itemtype;
                            var newitem =
                                    ' <div id="item_list_search_' + index + '" class="col-lg-4 col-md-4">' +
                                    '<div class="panel panel-default">' +
                                    '<div class="panel-heading">' +
                                    ' <span class="itemsearch-card" ' +
                                    'id="itemsearch-card-itemname">' + item.itemname + '</span>' +
                                    '</div>' +
                                    '<div class="panel-body">' +
                                    '<label class="itemsearch-card-info">' +
                                    '<span class="itemsearch-card-info-title" >' +
                                    'Type&nbsp;:&nbsp;' +
                                    '</span>' +
                                    '<span class="itemsearch-card-info-value">' + item.itemtype + '</span>' +
                                    '</label>' +
                                    '<label class="itemsearch-card-info">' +
                                    '<span class="itemsearch-card-info-title" >' +
                                    'Add On&nbsp;:&nbsp;' +
                                    ' </span>' +
                                    '<span class="itemsearch-card-info-value">'
                                    + item.itemadddate +
                                    '</span>' +
                                    '</label>' +
                                    '<label class="itemsearch-card-info">' +
                                    '<span class="itemsearch-card-info-title" >' +
                                    '  Address&nbsp;:&nbsp;' +
                                    '</span>' +
                                    '<span class="itemsearch-card-info-value">'
                                    + item.placeaddress +
                                    '</span>' +
                                    '</label>' +
                                    ' </div>' +
                                    '<div class="panel-footer">' +
                                    '<center>' +
                                    ' <span data-toggle="modal" data-target="#qr_modal"' +
                                    'onclick="itemsListFunctions.setItemQrModal(\'' + itemqrdata + '\', \'' + item.itemname + '\')" title="QR" ' +
                                    'class="qr-button btn btn-sm btn-default"><i class="fa fa-qrcode"></i></span>' +
                                    '&nbsp;<span onclick="itemsListFunctions.setdescriptionmodel(\'' + item.itemdescr + '\')" data-toggle="modal" data-target="#place_desc_modal" class="btn btn-warning btn-sm">' +
                                    '<i class="fa fa-file-text"></i>' +
                                    '</span>' +
                                    '&nbsp;<span onclick="itemcommentfunction.setsingleitemcomment(\'' + item.itemid + '\', 25, 0, 1)"  data-toggle="modal" data-target="#item_comments_list_modal" class="btn btn-primary btn-sm">' +
                                    '<i class="fa fa-comments"></i>' +
                                    '</span>' +
                                    '&nbsp;<span onclick="itemsListFunctions.itemsimagegallery(\'' + item.itemid + '\')" ' +
                                    'data-toggle="modal" data-target="#item_images_modal"' +
                                    'class="btn btn-default btn-sm">' +
                                    '<i class="fa fa-image"></i>' +
                                    '</span>' +
                                    '&nbsp;<span onclick="itemsListFunctions.setupdateitemmodel(\'' + item.itemid + '\', \'' + item.placeid + '\', \'' + item.itemtypeid + '\', \'' + item.itemname + '\', \'' + description + '\', \'' + item.statusview + '\')"' +
                                    'data-toggle="modal"' +
                                    'data-target="#update_item_modal"' +
                                    'class="btn btn-success btn-sm">' +
                                    '<i class="fa fa-edit"></i>' +
                                    '</span>' +
                                    '&nbsp;<span onclick="itemsListFunctions.setremovemodel(\'' + item.itemid + '\', \'' + index + '\')" data-toggle="modal" data-target="#remove_item_modal" class="btn btn-danger btn-sm">' +
                                    '<i class="fa fa-trash"></i>' +
                                    '</span>' +
                                    '</center>' +
                                    '</div>' +
                                    '</div>' +
                                    ' </div>';

                            $(newitem).appendTo('#form-item-search-result');
                            index++;
                        });

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

    itemcommentfunction = {
        removecomment: function (commentid, trid) {
            var Data = {
                'destination': 'commentremove',
                'commentid': commentid
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
                        $("#comment_tr_" + trid).toggle();
                    } else {
                        alert(data.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus);
                    alert(errorThrown);
                }
            });
        },
        setcommentmodal: function (comment) {
            $("#comment_modal_desc_text").text(comment);
        },
        commentnextpage: function (selectfrom, selectamount) {
            Data = {
                'destination': 'commentpagelist',
                'selectfrom': selectfrom,
                'selectamount': selectamount
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
                        $("#items-comments-list-table > tbody").empty();
                        var tdhtml = '';
                        var index = Number(selectfrom);
                        $.each(data.data, function (id, comment) {
                            var commenttext = comment.commtext;
                            commenttext = commenttext.replace(/'/g, '\'');
                            var commlen = commenttext.length;
                            var comm = "";
                            if (Number(commlen) > Number(100)) {
                                comm = commenttext.substring(0, 100) + '<a onclick="itemcommentfunction.setcommentmodal(\'' + commenttext + '\')" data-toggle="modal" data-target="#item_comment_modal">[..]</a>'
                            } else {
                                comm = commenttext;
                            }
                            tdhtml =
                                    '<tr id="comment_tr_"' + index + '>' +
                                    '<td>' + (index + 1) + '</td>' +
                                    '<td>' + comment.itemname + '</td>' +
                                    '<td>' + comment.username + '</td>' +
                                    '<td>' + comment.commdate + '</td>' +
                                    '<td>' +
                                    comm +
                                    '</td>' +
                                    '<td ALIGN=center>' +
                                    '<span onclick="itemcommentfunction.removecomment(\'' + comment.commid + '\', \'' + index + '\')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></span>' +
                                    '</td>' +
                                    '</tr>' +
                                    $("#items-comments-list-table > tbody:last").append(tdhtml);
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

        },
        setsingleitemcomment: function (itemid, selectamount, selectfrom, target) {

//            target == 1 -> first page
//            target == 2 -> next page
            if (target === 1) {
                $("#item-comments-modal-pagination").empty();
                itemcommentfunction.createsingleitemcommenttable(itemid, selectamount);
            }

            Data = {
                'destination': 'singleitemcomment',
                'selectfrom': selectfrom,
                'selectamount': selectamount,
                'itemid': itemid
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

                        if (data.data.length === 0) {
                            $("#item-comments-modal-pagination").hide();
                            $("#item-comments-modal-list-table").hide();
                            $("#nocomment-message").show();
                        }
                        else {
                            $("#item-comments-modal-pagination").show();
                            $("#item-comments-modal-list-table").show();
                            $("#nocomment-message").hide();
                        }

                        $("#item-comments-modal-list-table > tbody").empty();
                        var tdhtml = '';
                        var index = Number(selectfrom);
                        $.each(data.data, function (id, comment) {
                            
                            var commenttext = comment.commtext;
                            commenttext = commenttext.replace(/'/g, '\'');
                            var commlen = commenttext.length;
                            var comm = "";
                            if (Number(commlen) > Number(100)) {
                                comm = commenttext.substring(0, 100) + '<a onclick="itemcommentfunction.setcommentmodal(\'' + commenttext + '\')" data-toggle="modal" data-target="#item_comment_modal">[..]</a>'
                            } else {
                                comm = commenttext;
                            }
                            tdhtml =
                                    '<tr id="comment_tr_"' + index + '>' +
                                    '<td>' + (index + 1) + '</td>' +
                                    '<td>' + comment.username + '</td>' +
                                    '<td>' + comment.commdate + '</td>' +
                                    '<td>' +
                                    comm +
                                    '</td>' +
                                    '<td ALIGN=center>' +
                                    '<span onclick="itemcommentfunction.removecomment(\'' + comment.commid + '\', \'' + index + '\')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></span>' +
                                    '</td>' +
                                    '</tr>';
                                    $("#item-comments-modal-list-table > tbody:last").append(tdhtml);
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
        },
        createsingleitemcommenttable: function (itemid, selectanount) {
            var selectamount = selectanount;
            itemcommentfunction.getsingleitemcommentcount(itemid);
            var commentcount = singleitemcommentscount;
            var pages = commentcount / selectamount;
            if (isFloat(pages)) {
                pages = Math.floor(pages) + 1;
            }
            var selectfrom = 0;
            var selectto = selectamount;
            var roundnum = Number(1);
            $("#item-comments-modal-pagination").empty();
            for (var index = 0; index < pages; index++) {
                var nextpagebutton =
                        '<li><span ' +
                        'onclick="itemcommentfunction.setsingleitemcomment(\'' + itemid + '\', \'' + selectamount + '\', \'' + selectfrom + '\',  2)"' +
                        'class="btn" style="border-radius: 0px;">' +
                        (index + 1) +
                        '</span></li>';
                $("#item-comments-modal-pagination").append(nextpagebutton);
                roundnum++;
                selectfrom = selectto;
                selectto = selectamount * roundnum;
            }


//            console.log("selectamount = " + selectamount);
//            console.log("commentcount = " + commentcount);
//            console.log("pages = " + pages);

        },
        getsingleitemcommentcount: function (itemid) {
            Data = {
                'destination': 'singleitemcommentscount',
                'itemid': itemid
            };

            var url = sitelink + "/server/servecerequests.php";

            $.ajax({
                type: 'POST',
                url: url,
                data: Data,
                dataType: 'json',
                encode: true,
                async: false,
                success: function (data, textStatus, jqXHR) {
                    singleitemcommentscount = data.data;
                }
            });
        }
    };

    function isFloat(n) {
        return n === +n && n !== (n | 0);
    }

});




