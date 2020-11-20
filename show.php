<html>

<head>
  <title>ITFLab: Database</title>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
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
  <?php
    $conn = mysqli_init();
    mysqli_real_connect($conn, 'itflabserver.mysql.database.azure.com', 'itflab@itflabserver', 'Databaseeiei123', 'ITFlab', 3306);
    if (mysqli_connect_errno($conn)) {
      die('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    $res = mysqli_query($conn, 'SELECT * FROM guestbook');
    ?>
</head>

<script>
  $(document).ready(function () {
    $('#addrow').on('hidden.bs.modal', function () {
      $(this).find('form').trigger('reset');
    })
  })

  function Delete(id) {
    document.getElementById('row' + id).remove();
  }
</script>

<body>
  <div class="modal fade" id="deleteaccept" tabindex="-1" role="dialog" aria-labelledby="deleteacceptLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteacceptLabel" onclick="Delete()">Delete</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <center>
            <p align="center">Delete this row?</p>
          </center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="Delete()">Delete</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="addrow" tabindex="-1" role="dialog" aria-labelledby="addrowLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addrowLabel">Comment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="insert.php" method="post" id="CommentForm">
            <label>Name</label>
            <input type="text" name="name" id="idName" class="form-control mb-2" placeholder="Enter name">
            <label>Comment</label>
            <input type="text" name="comment" id="idComment" class="form-control mb-2" placeholder="Enter comment">
            <label>Link</label>
            <input type="text" name="link" id="idLink" class="form-control mb-2" placeholder="Enter link">
            <input type="submit" value="Comment" class="btn btn-success mt-2" data-dismiss="modal"></input>
          </form>
        </div>
        <!--
        <div class="modal-footer">
          <button type="submit" form="CommentForm" class="btn btn-success" id="commentBtn" data-dismiss="modal">Comment</button>
        </div>-->
      </div>
    </div>
  </div>
  <div class="card">
    <nav class="navbar navbar-light justify-content-between">
      <h3>ITFLab: Database</h3>
      <!--
      <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>-->
    </nav>
    <table class="table table-hover mb-3" width="680" border="1" id="data">
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
          <th width="80">
            <div align="center">Action</div>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($Result = mysqli_fetch_array($res)) {
        ?>
          <tr id="row<?php echo $Result['ID']; ?>">
            <td class="align-middle" width="100">
              <?php echo $Result['Name']; ?>
            </td>
            <td class="align-middle" width="350">
              <?php echo $Result['Comment']; ?>
            </td>
            <td class="align-middle" width="150">
              <?php echo $Result['Link']; ?>
            </td>
            <td class="align-middle" width="80">
              <button type="button" class="btn btn-primary">Edit</button>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteaccept" id="<?php echo $Result['ID']; ?>">Delete</button>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <?php mysqli_close($conn); ?>
    <div>
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addrow">Comment</button>
    </div>
  </div>
</body>

</html>