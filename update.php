<?php

$conn = mysqli_init();
mysqli_real_connect($conn, 'itflabserver.mysql.database.azure.com', 'itflab@itflabserver', 'Databaseeiei123', 'ITFlab', 3306);
if (mysqli_connect_errno($conn)) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$id = $_POST['iddd'];

$sql = "SELECT * FROM guestbook WHERE ID = '$id'";

$query = mysqli_query($conn, $sql);
if (!$query) {
    header('Location: show.php');
} else {
    $data = mysqli_fetch_assoc($query);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>ITFLab: Database</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        .card {
            margin-top: 2rem;
            margin-left: 4rem;
            margin-right: 4rem;
            border-radius: 20px;
            padding: 2rem 5rem 2rem;
            box-shadow: 0 20px 20px rgba(0, 0, 0, 0.2), 0px 0px 50px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    <div class="card">
        <nav class="navbar navbar-light justify-content-between">
            <h3>ITFLab: Database</h3>
        </nav>
        <form action="save.php" method="post">
            <input type="hidden" name="id" id="valID" value="<?php echo $data['ID']; ?>">
            <label>Name</label>
            <input type="text" name="name" id="idName" value="<?php echo $data['Name']; ?>" class="form-control mb-2" placeholder="Enter name">
            <label>Comment</label>
            <input type="text" name="comment" id="idComment" value="<?php echo $data['Comment']; ?>" class="form-control mb-2" placeholder="Enter comment">
            <label>Link</label>
            <input type="text" name="link" id="idLink" class="form-control" value="<?php echo $data['Link']; ?>" placeholder="Enter link">
            <input type="submit" class="btn btn-success btn-lg mt-3 mr-3" id="saveBtn" value="Save"></input>
            <button type="button" class="btn btn-secondary btn-lg mt-3" id="cancelBtn" onclick="window.location.replace('show.php');">Cancel</button>
        </form>
    </div>
</body>

</html>