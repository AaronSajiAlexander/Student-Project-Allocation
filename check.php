<?php
    session_start();
    $host = "localhost:3306";  
    $db_user = "root";  
    $db_password = "";  
    $db_name = "spa"; 

    $username = $_POST['user_id'];

     //Database connection
    $con = mysqli_connect($host,$db_user,$db_password,$db_name);
    
    if($con->connect_error)
    {
        echo "$con->connect-error";
        die("Connection Failed :".$con->connect_error);
    }else
    {

            $s = "select * from project_status where username = '$username'";
        
            $result = mysqli_query($con,$s);

            $num = mysqli_num_rows($result);

            if($num == 1)
            {
                echo("<SCRIPT LANGUAGE='JavaScript'>
                window.location.href='status.html';
                </SCRIPT>");
            }
            else{      
                echo("<SCRIPT LANGUAGE='JavaScript'>
                window.location.href='select_project.php';
                </SCRIPT>");
            } 
    }
?>