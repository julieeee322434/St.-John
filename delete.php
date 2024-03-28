<?php 
if( isset($_GET["deceased_id"])) {
    $deceased_id = $_GET["deceased_id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "St. John";

    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM deceased_info WHERE deceased_id=$deceased_id";
    $connection->query($sql);
}

header("location: /St. John/index.php");
exit;
?>
