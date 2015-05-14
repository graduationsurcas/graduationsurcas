$(document).ready(function () {

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
            $('#wait-spain-two').html('<i class="fa fa-spinner fa-pulse fa-4x"></i>');
            $('#wait-spain-three').html('<i class="fa fa-spinner fa-pulse fa-4x"></i>');
            $('#wait-spain-four').html('<i class="fa fa-spinner fa-pulse fa-4x"></i>');
            $('#wait-spain-five').html('<i class="fa fa-spinner fa-pulse fa-4x"></i>');
            $('#wait-spain-six').html('<i class="fa fa-spinner fa-pulse fa-4x"></i>');


        },
        complete: function (jqXHR, textStatus) {
            $('#wait-spain-one').html('');
            $('#wait-spain-two').html('');
             $('#wait-spain-three').html('');
              $('#wait-spain-four').html('');
              $('#wait-spain-five').html('');
               $('#wait-spain-six').html('');


        },
        success: function (data, textStatus, jqXHR) {
            

            var doughnutData = [
                {
                    value: data.languages.ar,
                    color: "#F7464A",
                    highlight: "#FF5A5E",
                    label: "ARABIC user"
                },
                {
                    value: data.languages.en,
                    color: "#46BFBD",
                    highlight: "#5AD3D1",
                    label: "English user"
                },
                {
                    value: data.languages.fr,
                    color: "#FDB45C",
                    highlight: "#FFC870",
                    label: "France user"
                },
                {
//                   
                    value: data.languages.gr,
                    color: "#949FB1",
                    highlight: "#A8B3C5",
                    label: "Germany user"
                },
                {
                    value: data.languages.pt,
                    color: "#006600",
                    highlight: "#00CC00",
                    label: "Portuguese user"
                },
                {
                    value: data.languages.es,
                    color: "#FFCC00",
                    highlight: "#FFFF00",
                    label: "Spanish user"
                },
                {
                    value: data.languages.it,
                    color: "#000066",
                    highlight: "#0000CC",
                    label: "Italian user"
                }
               

            ];

            var pieData = [
                {
                    value: data.place.museum,
                    color: "#F7464A",
                    highlight: "#FF5A5E",
                    label: "Museum user"
                },
                {
                    value: data.place.fort,
                    color: "#46BFBD",
                    highlight: "#5AD3D1",
                    label: "Fort Place"
                },
                {
                    value: data.place.castel,
                    color: "#FDB45C",
                    highlight: "#FFC870",
                    label: "Castel Place"
                },
                {
                    value: data.place.burg,
                    color: "#949FB1",
                    highlight: "#A8B3C5",
                    label: "burg Place"
                }

            ];
            //services
          
                         var polarData = [
				{
					value: data.service.service,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Available Service"
				},
				{
					value: data.service.service_request,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "Wait Acceptance"
				}

			];
                        
                        var dabasize = [
				{
					value: data.DBSize.size,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Used DataBase Size(MB)"
				}

			];
                       
                        var sharearea = [
				{
					value: data.sharearea.sharearea,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Share Area"
				},
                                {
					value: data.sharearea.sharecomment,
					color: "#46BFBD",
                                        highlight: "#5AD3D1",
					label: "Comment"
				}

			];
                       
                       
                       var item = [
				{
					value: data.item.item,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Antiques left"
				},
                                {
					value: data.item.item_comment,
					color: "#46BFBD",
                                        highlight: "#5AD3D1",
					label: "Antiques Comment"
				}

			];
            var language_element = document.getElementById("user-statistics").getContext("2d");
            window.myDoughnut = new Chart(language_element).Doughnut(doughnutData, {responsive: true});
            var place_element = document.getElementById("places-statistics").getContext("2d");
            window.myPie = new Chart(place_element).Pie(pieData, {responsive:true});
            var service_element = document.getElementById("service-statistics").getContext("2d");
            window.myPolarArea = new Chart(service_element).PolarArea(polarData, {responsive:true});
            var dbsize_element = document.getElementById("dbsize-statistics").getContext("2d");
            window.myPie = new Chart(dbsize_element).Pie(dabasize, {responsive:true});
            var sharearea_element = document.getElementById("sharearea-statistics").getContext("2d");
            window.myPie = new Chart(sharearea_element).Doughnut(sharearea, {responsive:true});
            var item_element = document.getElementById("item-statistics").getContext("2d");
            window.myPie = new Chart(item_element).Pie(item, {responsive:true});
            console.log(data.item.item)
                        console.log(data.item.item_comment)

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(errorThrown)
        }
    });
});


