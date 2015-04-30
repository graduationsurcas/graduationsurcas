$(document).ready(function() {
    
    var Data = {
            'destination': 'serviceproviderupdate'
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
					value: 600,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "AR"
				},
				{
					value: 50,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "EN"
				},
				{
					value: 100,
					color: "#FDB45C",
					highlight: "#FFC870",
					label: "Yellow"
				},
				{
					value: 40,
					color: "#949FB1",
					highlight: "#A8B3C5",
					label: "Grey"
				},
				{
					value: 120,
					color: "#4D5360",
					highlight: "#616774",
					label: "Dark Grey"
				}

			];

			window.onload = function(){
				var ctx = document.getElementById("places-statistics").getContext("2d");
				window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {responsive : true});
                                var ctx2 = document.getElementById("chart-area2").getContext("2d");
				window.myDoughnut = new Chart(ctx2).Doughnut(doughnutData, {responsive : true});
			};
            },
            error: function (jqXHR, textStatus, errorThrown) {
                
            }
        });
});


