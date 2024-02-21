<?php require '../controller/StudentController.php'; ?>
<?php
        $edit_id = $_GET['edit_id'];
        $data = $_SESSION['student_data'];
    if (!(empty($data))) {
        foreach($data as $index => $student) {
            if ($index == $edit_id) {
                $first_name = $student['first_name'];
                $last_name = $student['last_name'];
                $age = $student['age'];
            }
        }
    }
    $studentController = new StudentController();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(!(empty($_POST['first_name'])) && !(empty($_POST['last_name'])) && !(empty($_POST['age']))){
            $studentController->editData($_POST);
        }else{
            header('location:index.php');
        }
    }
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
    <form method="post" action="updatestudent.php">
        <input type='hidden' name='edit_id' value="<?php echo $edit_id; ?>">
        <div class="container mt-5 mb-5 d-flex justify-content-center">
            <div class="card px-2 py-2"><!--style="background-color: #a8b0b7;"-->
                <div class="card-body">
                    <h3 class="card-title mb-4">Edit Student Form</h3><div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <!-- <label for="name">Name</label> --> <input class="form-control" type="text" name="first_name" placeholder="First Name" value="<?php echo $first_name; ?>"> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="input-group"> <input class="form-control" type="text" name="last_name" placeholder="Last Name" value="<?php echo $last_name; ?>"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="input-group"> <input class="form-control" type="text" name="age" placeholder="Age" value="<?php echo $age; ?>"> </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Confirm</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>