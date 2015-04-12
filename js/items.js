
$(document).ready(function () {

    //  To add new input file field dynamically,
    //   on click of "Add More Files" button below
    //    function will be executed.
    $('#add_more').click(function () {
        $(this).before($("<div/>", {
            id: 'filediv'
        }).fadeIn('slow').append($("<input/>", {
            name: 'file[]',
            type: 'file',
            id: 'new_item_name_image',
            class: 'form-control'
        }), $("<br/><br/>")));
    });


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
        itemsnextpage: function (selectfrom, selectto) {
            Data = {
                'destination': 'itemspagelist',
                'selectfrom': selectfrom,
                'selectto': selectto
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
                        $("#items-list-table > tbody").empty();
//                        console.log(data.data);
                        var tdhtml = '';
                        var index = Number(selectfrom);
                        $.each(data.data, function (id, item) {
                            tdhtml = '<tr>' +
                               ' <td>' + (index + 1) + '</td>' +
                                '<td>'+item.itemname+'</td>'+
                                '<td>'+item.itemtype+'</td>'+
                                '<td>'+item.itemplace+'</td>'+
                                '<td>'+item.itemadddate+'</td>'+
                               ' <td>'+
                        '<center>'+
                            '<span class="btn btn-warning btn-sm">'+
                                '<i class="fa fa-image"></i>'+
                            '</span>'+
                        '</center>'+
                        '</td>'+
                        '<td>'+
                        '<center>'+
                            '<span class="btn btn-primary btn-sm">'+
                                '<i class="fa fa-edit"></i>'+
                            '</span>'+
                            '&nbsp;<span class="btn btn-danger btn-sm">'+
                                '<i class="fa fa-trash"></i>'+
                            '</span>'+
                        '</center>'+
                        '</td>'+
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
        
        itemsimagegallery:function (itemid){
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
                            active = (index == 0)? active : "";
                            imagehtml = imagehtml +
                            '<div class="'+active+' item"><img  alt="" title="" src="../uploadsimages/'+item.image_title+'"></div>';
                            
                            smallimagehtml = smallimagehtml +
                                    '<li class="'+active+'" data-slide-to="'+index+'" data-target="#article-photo-carousel">'+
                                    '<img alt="" src="'+item.image_path+item.image_title+'">'+
                                    '</li>'+
                            
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
        }
    };
});


