<html>

<head>
  <title>ITF Lab</title>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
  <?php
  $conn = mysqli_init();
  mysqli_real_connect($conn, 'itflabserver.mysql.database.azure.com', 'itflab@itflabserver', 'Boss0899046417', 'ITFlab', 3306);
  if (mysqli_connect_errno($conn)) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
  }
  $res = mysqli_query($conn, 'SELECT * FROM guestbook');
  ?>
  <table class="table">
    <thead class="table table-dark">
      <tr>
        <th width="100">
          <div align="center">Name</div>
        </th>
        <th width="350">
          <div align="center">Comment </div>
        </th>
        <th width="150">
          <div align="center">Link </div>
        </th>
      </tr>
    </thead>
    <tbody class="table table-hover" width="600" border="1">

    </tbody>
    <?php
    while ($Result = mysqli_fetch_array($res)) {
    ?>
      <tr>
        <td>
          <?php echo $Result['Name']; ?></div>
        </td>
        <td>
          <?php echo $Result['Comment']; ?>
        </td>
        <td>
          <?php echo $Result['Link']; ?>
        </td>
      </tr>
    <?php
    }
    ?>
  </table>
  <?php mysqli_close($conn); ?>
</body>

</html>