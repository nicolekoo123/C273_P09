$(document).ready(function () {
    $("#idCountry").change(function () {
        var idCountry = $("#idCountry").val();
        $.ajax({
            type: "GET",
            url: "https://cloudninep09.azurewebsites.net/getCountryDetails.php",
            cache: false,
            dataType: "JSON",
            data: "id=" + idCountry,
            success: function (response) {
                var message = "<thead><tr><th>Population</th><th>Obese</th></tr></thead>";
                message += "<tbody>";
                message += "<tr><td>" + response[0].population + "</td>" +
                        "<td>" + response[0].obese + "</td></tr>";
                message += "</tbody>"
                $("#obeseTable").html(message);
            },
            error: function (obj, textStatus, errorThrown) {
                console.log("Error " + textStatus + ": " + errorThrown);
            }
        });
    });

});
