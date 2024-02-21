<?php require '../controller/StudentController.php'; ?>
<?php
    $studentController = new StudentController();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(!(empty($_POST['first_name'])) && !(empty($_POST['last_name'])) && !(empty($_POST['age']))){
            $studentController->inputData($_POST);
        }
        if(isset($_POST['unsetTheData'])){
            unset($_SESSION['student_data']);
        }
    }
    if(isset($_GET['delete_id'])){
        $id = $_GET['delete_id'];
        unset($_SESSION['student_data'][$id]);
        header('location:index.php');
    }
    $data = $studentController->getData();
?>

<!doctype html>
<html lang="en">
  <head>  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Student Form</title>
    <style>
        html,
        body,
        .intro {
          height: 100%;
        }

        table td,
        table th {
          text-overflow: ellipsis;
          white-space: nowrap;
          overflow: hidden;
        }

        .card {
          border-radius: .5rem;
        }

        .mask-custom {
          background: rgba(24, 24, 16, .2);
          border-radius: 2em;
          backdrop-filter: blur(25px);
          border: 2px solid rgba(255, 255, 255, 0.05);
          background-clip: padding-box;
          box-shadow: 10px 10px 10px rgba(46, 54, 68, 0.03);
        }
    </style>
</head>
<body>
<form method="post" action="index.php">
<div class="container mt-5 mb-5 d-flex justify-content-center">
     <div class="card px-2 py-2"><!--style="background-color: #a8b0b7;"-->
        <div class="card-body">
            <h3 class="card-title mb-4">Add Student Form</h3><div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <!-- <label for="name">Name</label> --> <input class="form-control" type="text" name="first_name" placeholder="First Name"> </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="input-group"> <input class="form-control" type="text" name="last_name" placeholder="Last Name"> </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="input-group"> <input class="form-control" type="text" name="age" placeholder="Age"> </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-primary">Confirm</button>
            <button type="submit" class="btn btn-outline-danger" name="unsetTheData">destroy All Data</button>
        </div>
    </div>
</div>
</form>


<section class="intro">
  <div class="bg-image h-10">
    <div class="mask d-flex align-items-center h-10">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-8">
            <div class="card shadow-2-strong" style="background-color: #a5f0ff;">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-borderless mb-0">
                    <thead>
                      <tr>
                        <th scope="col">S.R.No</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Age</th>
                        <th scope="col" colspan="2">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        if (!(empty($data))) {
                        foreach($data as $index => $student) {
                    ?>
                    <tr>  
                      <td><?php echo $index+1; ?></td>
                      <td><?php echo $student['first_name']; ?></td>
                      <td><?php echo $student['last_name']; ?></td>
                      <td><?php echo $student['age']; ?></td>
                      <td>
                        <a href="updatestudent.php?edit_id=<?Php echo $index; ?>">
                        <button type="submit" class="btn btn-success btn-sm px-3">Edit</button></a>
                        <a href="index.php?delete_id=<?Php echo $index; ?>">
                          <button type="submit" class="btn btn-danger btn-sm px-3">Delete</button></a>
                        </td>
                    </tr>
                    <?php
                        } }
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>