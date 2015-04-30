$(document).ready(function() {
    
    var Data = {
            'destination': 'getstatisticscount'
        };
        var url = sitelink + "/server/servecerequests.php";
        $.ajax({
            type: 'POST',
            url: url,
            data: Data,
            dataType: 'json',
            encode: true,
            beforeSend: function (xhr) {
                $('#wait-spain-one').html('<i class="fa fa-spinner fa-pulse fa-4x"></i>');
            },
            complete: function (jqXHR, textStatus) {
               $('#wait-spain-one').html('');
            },
            success: function (data, textStatus, jqXHR) { 
               var doughnutData = [
				{
					value: data.ar,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "ARABIC user"
				},
				{
					value: data.en,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "English user"
				},
				{
					value: data.fr,
					color: "#FDB45C",
					highlight: "#FFC870",
					label: "France user"
				},
				{
					value: data.gr,
					color: "#949FB1",
					highlight: "#A8B3C5",
					label: "Germany user"
				}

			];
                                var language_element = document.getElementById("user-statistics").getContext("2d");
				window.myDoughnut = new Chart(language_element).Doughnut(doughnutData, {responsive : true});
                                var place_element = document.getElementById("chart-area2").getContext("2d");
				window.myDoughnut = new Chart(place_element).Doughnut(doughnutData, {responsive : true});
			
            },
            error: function (jqXHR, textStatus, errorThrown) {
                
            }
        });
});


