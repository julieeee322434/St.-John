<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "St. John";

// Database Connection
$connection =  new mysqli($servername, $username, $password, $database);

$name="";
$born_date="";
$date_of_death="";
$gender="";
$grave_id="";

$errorMessage= "";
$successMessage= "";

if ( $_SERVER['REQUEST_METHOD']=='POST'){
    $name= $_POST["name"];
    $born_date=$_POST["born_date"];
    $date_of_death=$_POST["date_of_death"];
    $gender=$_POST["gender"];
    $grave_id=$_POST["grave_id"];

    do {
        if ( empty($name)|| empty($born_date) || empty($date_of_death) || empty($gender) || empty($grave_id)){
            $errorMessage = "All the fields are required";
            break;
        }
            $sql ="INSERT INTO deceased_info(name, born_date, date_of_death, gender, grave_id )" .
             "VALUES ('$name', '$born_date', ' $date_of_death', '$gender', '$grave_id')";

             $result = $connection->query($sql);

             if (!$result){
                $errorMessage = "Invalid query" . $connection->error;
                break;
             }
        
        $name="";
        $born_date="";
        $date_of_death="";
        $gender="";
        $grave_id="";

        $successMessage = "Client added correctly";

        header("location: /St. John/index.php");
        exit;

             } while (false);
            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>St. John</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src=https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js></script>
</head>
<body>
    <div class = "container my-5">
        <h2>New Clients</h2>

        <?php
        if ( !empty($errorMessage)){
            echo"
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong> $errorMessage</strong>
            <button type = 'button' class='btn-close' data-bs-dismiss-alert' aria-label='Close'></button>
            </div>
            ";
        }
                ?>
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Born Date</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="born_date" value="<?php echo $born_date; ?>">
            </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Date of Death</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="date_of_death" value="<?php echo $date_of_death; ?>">
            </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Gender</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="gender" value="<?php echo $gender; ?>">
            </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Grave ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="grave_id" value="<?php echo $grave_id; ?>">
            </div>
            </div>

            <?php 
            if ( !empty($successMessage)){
                echo"
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'></div>
                <strong> $successMessage</strong>
                <button type = 'button' class='btn-close' data-bs-dismiss-alert' aria-label='Close'></button>
                </div>
                ";
            }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sn-3 g-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                    <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/St. John/index.php" role="button" >Cancel</a>
        </div>
        
        </div>
        </form>
    </div>
    
</body>
</html>
