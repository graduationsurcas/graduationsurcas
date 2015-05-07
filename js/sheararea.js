 sheararealistfuntion = {
        itemsnextpage: function (selectfrom, selectamount) {
            Data = {
                'destination': 'shararealist',
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
                                    'onclick="itemsListFunctions.setItemQrModal(\'' + item.itemid + '\', \'' + item.itemname + '\')" title="QR" ' +
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
