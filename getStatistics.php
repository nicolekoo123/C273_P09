<?php

include "dbFunctions.php"; 

// SQL query returns multiple database records.
$query = "SELECT * FROM statistics order by id"; 
$result = mysqli_query($link, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $statistics[] = $row;
}
mysqli_close($link);

echo json_encode($statistics);
?>
