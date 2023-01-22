<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css">
    <title>View Students</title>
</head>

<body>
    <div>
        <div>
            <div class="forms">
                <div class="form-login">
                    <span class="title">
                        <center>
                            <h1>All Students</h1>
                        </center>
                    </span>
                    <?php

                    session_start();
                    $host = "localhost:3306";  
                    $db_user = "root";  
                    $db_password = "";  
                    $db_name = "spa"; 


                    // Database connection
                    $con = mysqli_connect($host,$db_user,$db_password,$db_name);

                    if($con->connect_error)
                    {
                    echo "$con->connect-error";
                    die("Connection Failed :".$con->connect_error);
                    }
                    else{

                    $stmt2 = "select * from project_status"; 
                    $res = mysqli_query($con,$stmt2);

                    if($res)
                    {
                        while($row = mysqli_fetch_assoc($res))
                        {

                        echo'<div>'.
                        '<h5>Student ID : '.$row['username'].'</h5>'.
                        '<h5>Project Name : '.$row['project_name'].'</h5>'.
                        '<h5>Status : '.$row['status'].'</h5>'.        
                        '</div>';

                        }
                        mysqli_free_result($res);
                        mysqli_close($con);
                    } 
                    else{
                        echo("<SCRIPT LANGUAGE='JavaScript'>
                            window.alert('Unable to Display Student List');
                            window.location.href = 'faculty_home.html';
                        </SCRIPT>");
                    }
                    }
                ?>
                    <button onclick="window.location='faculty_home.html'">Home Page</button>
                    <button onclick="window.location='faculty_login.html'">Exit</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>