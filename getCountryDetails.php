<?php

include "dbFunctions.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
// SQL query returns multiple database records.
    $query = "Select * From statistics Where id ='$id'";
    $result = mysqli_query($link, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $idArr[] = $row;
    }
    mysqli_close($link);

    echo json_encode($idArr);
}
?>
