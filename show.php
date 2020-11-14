<html>

<head>
  <title>ITFLab</title>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <style>
    .card {
      border-radius: 20px;
      padding: 2rem 10rem 2rem;
      box-shadow: 0 20px 20px rgba(0, 0, 0, 0.2), 0px 0px 50px rgba(0, 0, 0, 0.2);
    }
  </style>
</head>

<script>
  function Delete(id) {
    console.log('row' + id)
    document.getElementById('row' + id).remove();
  }
</script>

<body>
  <div class="card">
    <?php
    $conn = mysqli_init();
    mysqli_real_connect($conn, 'itflabserver.mysql.database.azure.com', 'itflab@itflabserver', 'Boss0899046417', 'ITFlab', 3306);
    if (mysqli_connect_errno($conn)) {
      die('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    $res = mysqli_query($conn, 'SELECT * FROM guestbook');
    ?>
    <table class="table table-hover" width="700" border="1">
      <thead class="thead-dark">
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
          <th width="100">
            <div align="center">Action</div>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($Result = mysqli_fetch_array($res)) {
        ?>
          <tr id="row<?php echo $Result['ID']; ?>">
            <td class="align-middle" width="150">
              <?php echo $Result['Name']; ?>
            </td>
            <td class="align-middle" width="350">
              <?php echo $Result['Comment']; ?>
            </td>
            <td class="align-middle" width="150">
              <?php echo $Result['Link']; ?>
            </td>
            <td class="align-middle" width="100">
              <button type="button" class="btn btn-primary">Edit</button>
              <button type="button" class="btn btn-danger" onclick="Delete(<?php echo $Result['ID']; ?>)">Delete</button>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <?php mysqli_close($conn); ?>
    <button type="button" class="btn btn-success">Add Row</button>
  </div>
</body>

</html>