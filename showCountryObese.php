<?php
include("dbFunctions.php");

$statistics = array();
$query = "SELECT * FROM statistics";
$result = mysqli_query($link, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $statistics[] = $row;
}
mysqli_close($link);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>View Obesity and Population by country</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/showCountryObese.js" type="text/javascript"></script>
        <script>
            $(document).ready(function(){
               $("#idCountry").change(function(){
                  var idCountry = $("#idCountry").val();
                  $.ajax({
                     type: "GET",
                     url: "http://localhost/C273/P09/C273_P09/getCountryDetails.php",
                     cache: false,
                     dataType: "JSON",
                     data: "id=" + idCountry,
                     success: function(response) {
                         var message = "<thead><tr><th>Population</th><th>Obese</th></tr></thead>";
                         message += "<tbody>";
                         message +="<tr><td>" + response[0].population + "</td>" + 
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
        </script>
    </head>

    <body>
        <div class="container">
            <br/>
            <select id="idCountry">
                <option value="">Please select</option>
                <?php
                for ($i = 0; $i < count($statistics); $i++) {
                    ?>
                    <option value="<?php echo $statistics[$i]['id']; ?>"><?php echo $statistics[$i]['country']; ?></option>                 
                <?php } ?> 
            </select>
            <br/><br/>

            <table class="table table-striped" id="obeseTable">
                <thead>
                    <tr>
                        <th>Population</th>
                        <th>Obese</th>
                    </tr>
                </thead>

            </table>
        </div>
    </body>
</html>