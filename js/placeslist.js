$(document).ready(function () {
    placesListFunctions = {
        placesnextpage: function (selectfrom, selectto) {
            Data = {
                'destination': 'placespagelist',
                'selectfrom': selectfrom,
                'selectto': selectto
            };
            var url = sitelink + '/services/DB/servecerequests.php';
            $.ajax({type: 'POST',
                url: url,
                data: Data,
                dataType: 'json',
                encode: true,
                success: function (data, textStatus, jqXHR) {
                    console.log(s);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
        }
    };
});