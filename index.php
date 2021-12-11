<?php
//"INSERT INTO `notes` (`sno`, `title`, `description`, `tstamp`) VALUES (NULL, 'Buy Books', 'Please buy books from store', current_timestamp());"
$insert = false;
$update = false;
$delete = false;
//Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "notes";

//Create a Connection
$conn = mysqli_connect($servername,$username,$password,$database);

//Die if connection was not successful
if(!$conn){
  die("Sorry we failed to connect: ".mysqli_connect_error());
}

if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `notes` WHERE `sno` = $sno";
  $result = mysqli_query($conn,$sql);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset( $_POST['snoEdit'])){
    //Update the record
    $sno = $_POST["snoEdit"];
    $title = $_POST["titleEdit"];
    $description = $_POST["descriptionEdit"];

    //sql query to be executed
    $sql ="UPDATE `notes` SET `title` = '$title', `description` = '$description' WHERE `notes`.`sno` = $sno";
    $result = mysqli_query($conn,$sql);
    if($result){
     $update = true;
    }
    else{
      echo "We could not update the record succesfully";
    }
  }
  else{
    $title = $_POST["title"];
    $description = $_POST["description"];

    //sql query to be executed
    $sql ="INSERT INTO `notes` (`title`,`description`) VALUES('$title','$description')";
    $result = mysqli_query($conn,$sql);


    if($result){
      $insert = true;
    }
    else{
      echo "The record was not inserted successfully! because of this error -->".mysqli_error($conn);
    }
  }
}
?>

<!doctype html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">


    <title>iNotes - Notes taking made easy</title>

  </head>

  <body>


<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" 
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">x</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/Crud/index.php" method="post">
          <input type="hidden" name="snoEdit" id="snoEdit">
          <div class="form-group"><!--<div class="mb-3">-->
            <label for="title" class="form-label">Note Title</label>
            <input type="text" class="form-control" name="titleEdit" id="titleEdit" aria-describedby="emailHelp">
          </div>

          <div class="form-group">
              <label for="desc">Note Description</label>
              <textarea class="form-control" name="descriptionEdit" id="descriptionEdit" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Update Note</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">iNotes</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

      <?php
      if($insert){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Your note has been inserted successfully.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
      }
      ?>
      <?php
      if($delete){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Your note has been deleted successfully.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
      }
      ?>
      <?php
      if($update){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Your note has been Updated successfully.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
      }
      ?>
      <div class="container my-4">
        <h2>Add a Note</h2>
        <form action="/Crud/index.php" method="post">
            <div class="mb-3">
              <label for="title" class="form-label">Note Title</label>
              <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="desc">Note Description</label>
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Note</button>
          </form>
      </div>

      <div class="container my-4">
          

<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">S.No.</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php 
          $sql = "SELECT * FROM `notes`";
          $result = mysqli_query($conn,$sql);
          $sno = 0;
          while($row= mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo " <tr>
            <th scope='row'>". $sno ."</th>
            <td>". $row['title'] ."</td>
            <td>". $row['description'] ."</td>
            <td><button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['sno'].">Delete</button></td>
          </tr>"; 
          }   
          ?>
    

  </tbody>
</table>
      </div>
      <hr>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready( function () {
         $('#myTable').DataTable();

     } );
    </script>
    <script>
      edits = document.getElementsByClassName('edit');
      Array.from(edits).forEach((element)=>{
        element.addEventListener("click",(e)=>{
          console.log("edit",);
          tr = e.target.parentNode.parentNode;
          title = tr.getElementsByTagName("td")[0].innerText;
          description = tr.getElementsByTagName("td")[1].innerText;
          console.log(title,description);
          titleEdit.value = title;
          descriptionEdit.value = description;
          snoEdit.value = e.target.id;
          console.log(e.target.id);
          $('#editModal').modal('toggle');
        })
      })

      deletes = document.getElementsByClassName('delete');
      Array.from(deletes).forEach((element)=>{
        element.addEventListener("click",(e)=>{
          console.log("delete",);
          sno = e.target.id.substr(1,);
          
          if(confirm("Are you sure to delette this note!")){
            console.log("yes");
            window.location = `/crud/index.php?delete= ${sno}`;
            // TODO: Create a form and use post request to submit a form
          }
          else{
            console.log("no");
          }
        })
      })
    </script>
  </body>

</html>
