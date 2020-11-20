<?php

$conn = mysqli_init();
mysqli_real_connect($conn, 'itflabserver.mysql.database.azure.com', 'itflab@itflabserver', 'Databaseeiei123', 'ITFlab', 3306);
if (mysqli_connect_errno($conn)) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$ID = $_POST['ID'];

$sql = "DELETE FROM guestbook WHERE ID = $ID";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully"; ?>
    <script>
        window.location.replace("show.php");
    </script><?php
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            mysqli_close($conn);
                ?>