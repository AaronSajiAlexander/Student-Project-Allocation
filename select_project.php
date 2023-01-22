<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css">
    <title>Select Project</title>
</head>

<body>
    <div>
        <div>
            <div class="forms">
                <div class="form-login">
                    <span class="title">
                        <center>
                            <h1>Select Project</h1>
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

                    $stmt2 = "select project_name from project_list where status='NULL'"; 
                    $res = mysqli_query($con,$stmt2);

                    if($res)
                    {
                        while($row = mysqli_fetch_assoc($res))
                        {

                        echo'<div>'.
                        '<h5>'.$row['project_name'].'</h5>'.        
                        '</div>';

                        }
                        mysqli_free_result($res);
                        mysqli_close($con);
                    } 
                    else{
                        echo("<SCRIPT LANGUAGE='JavaScript'>
                            window.alert('Unable to Display Project List');
                            window.location.href = 'home.html';
                        </SCRIPT>");
                    }
                    }
                ?>
                    <form action="update_project.php" method="post">
                        <div class="input-field">
                            <label for="username"></label>
                            <input type="text" placeholder="User ID" name="username" required>
                            <i class="uil uil-user "></i>
                        </div>
                        <div class="input-field">
                            <label for="proj_name"></label>
                            <input type="text" placeholder="Project Name" name="proj_name" required>
                            <i class="uil uil-user "></i>
                        </div>
                         <div class="input-field button">
                            <input type="submit" value="Submit">
                            <button onclick="window.location='login.html'">Exit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>