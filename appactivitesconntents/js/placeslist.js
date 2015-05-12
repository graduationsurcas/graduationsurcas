
$(document).ready(function () {
    $("#loadmore-button").click(function () {
        Data = {
            'destination': 'placeslistnextpage',
            'selectfrom': $("#selectfrom").val(),
            'lang': $("#userlang").val(),
            'selectamount': $("#selectamount").val()
        };

        

        var nextfrom = Number($("#round").val()) * Number($("#selectamount").val());
        $("#selectfrom").val(nextfrom);
        $("#round").val(Number($("#round").val()) + 1);

        var url = sitelink + "/appactivitesconntents/server/servicesrequests.php";

        $.ajax({
            type: 'POST',
            url: url,
            data: Data,
            dataType: 'json',
            encode: true,
            timeout: 60000, //timeout to 8 seconds 
            beforeSend: function (xhr) {
                $("#loadmore-spinner").show();
                $("#loadmore-button").hide();
            },
            complete: function (jqXHR, textStatus) {
                $("#loadmore-spinner").hide();
                $("#loadmore-button").show();
                
            },
            success: function (data, textStatus, jqXHR) {
                if(data.length === 0){
                   $(".load-more").hide(); 
                }else{
                    
                $("#PlacesListTemplate").tmpl(data).appendTo(".main-places-section");
                }
               
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert()
                if (textStatus === 'timeout') {
                    alert('Failed from timeout');
                    //do something. Try again perhaps?
                }
            },
        });

    });
});





