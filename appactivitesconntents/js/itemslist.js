
$(document).ready(function () {
    $("#loadmore-button").click(function () {
        Data = {
            'destination': 'itemlistnextpage',
            'selectfrom': $("#selectfrom").val(),
            'lang': $("#userlang").val(),
            'selectamount': $("#selectamount").val()
        };


        var nextfrom = Number($("#round").val()) * Number($("#selectamount").val());
        $("#selectfrom").val(nextfrom);
        $("#round").val(Number($("#round").val()) + 1);

  

        $.ajax({
            type: 'POST',
            url: requesturl,
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
                console.log(data)
                if(data.length === 0){
                   $(".load-more").hide(); 
                }else{
                    
                $("#ItemsListTemplate").tmpl(data).appendTo(".main-items-section");
                }
               
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown)
                if (textStatus === 'timeout') {
                    alert('Failed from timeout');
                    //do something. Try again perhaps?
                }
            },
        });

    });
});





