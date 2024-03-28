<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>St. John</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class = "container my-5">
        <h2>List of Clients</h2>
        <a class="btn btn-primary" href="/St. John/create.php" role="button">New Client</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Deceased ID</th>
                    <th>Name</th>
                    <th>Born Date</th>
                    <th>Date of Death</th>
                    <th>Gender</th>
                    <th>Grave ID</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "St. John";

                // Database Connection
                $connection =  new mysqli($servername, $username, $password, $database);
                 
 
                if ($connection->connect_error){
                die("Connection Failed: " . $connection->connect_error);
                }

                $sql = "SELECT deceased_id, grave_id, name, born_date, date_of_death, gender FROM deceased_info";
                $result = $connection->query($sql);

                if (!$result){
                    die("Invalid query: . $conncetion->error");
                }

                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                        <td>{$row['deceased_id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['born_date']}</td> 
                        <td>{$row['date_of_death']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['grave_id']}</td>
                        <td>
                        <a class='btn btn-primary btn-sn' href='/St. John/edit.php?deceased_id={$row['deceased_id']}'>Edit</a>
                            <a class='btn btn-danger btn-sn' href='/St. John/delete.php?deceased_id={$row['deceased_id']}'>Delete</a>
                        </td>
                    </tr>
                    ";
                }
                

                ?>
                
            </tbody>
        </table>
    </div>
    
</body>
</html>
