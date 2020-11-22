<?php
$conn = mysqli_init();
mysqli_real_connect($conn, 'itfserverlab.mysql.database.azure.com', 'itflab@itfserverlab', 'Databaseeiei123', 'ITFlab', 3306);
if (mysqli_connect_errno($conn)) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$name = $_POST['name'];
$comment = $_POST['comment'];
$link = $_POST['link'];
$id = $_POST['id'];

$sql = "UPDATE guestbook SET Name = '$name', Comment = '$comment', Link = '$link' WHERE ID = '$id'";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITFLab: Database</title>
</head>

<body>
    <?php
    if (mysqli_query($conn, $sql)) {
        echo 'Saved';
    } else {
        echo "Fail to load";
    }
    ?>

    <script>
        window.location.replace("show.php");
    </script>
</body>

</html>