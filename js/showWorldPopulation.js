$(document).ready(function () {
    $.ajax({
        url: "http://localhost/C273/P09/C273_P09/getStatistics.php",
        cache: false,
        dataType: "JSON",
        success: function (response) {
            var countryArr = [];
            var populationArr = [];
            for (i = 0; i < response.length; i++){
                countryArr.push(response[i].country);
                populationArr.push(response[i].population)
            }
            var barChart = new Chart($("#barChart"), {
                type: 'horizontalBar',
                data: {
                    datasets: [{
                            data: populationArr,
                            backgroundColor: "lightblue",
                            label: 'Population'
                        }],
                    labels: countryArr
                },
                options: {
                    responsive: true
                }
            });
        },
        error: function (obj, textStatus, errorThrown) {
            console.log("Error " + textStatus + ": " + errorThrown);
        }
    });
    /*var data = [10, 20, 30, 40, 50];
     var labels = ["Singapore", "Malaysia", "Thailand", "Vietnam", "Myanmar"];
     
     var barChart = new Chart($("#barChart"), {
     type: 'horizontalBar',
     data: {
     datasets: [{
     data: data,
     backgroundColor: "lightblue",
     label: 'Population'
     }],
     labels: labels
     },
     options: {
     responsive: true
     }
     });*/

});
