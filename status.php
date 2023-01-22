<?php
    session_start();
    $host = "localhost:3306";  
    $db_user = "root";  
    $db_password = "";  
    $db_name = "spa"; 

    $username = $_POST['username'];
    $status = $_POST['status'];

     //Database connection
    $con = mysqli_connect($host,$db_user,$db_password,$db_name);
    
    
    if($con->connect_error)
    {
        echo "$con->connect-error";
        die("Connection Failed :".$con->connect_error);
    }else
    {

        $s = "update project_status set status='$status' where username='$username'";
        
        $result = mysqli_query($con,$s);


        if($result)
        {
            echo("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Status Updated!');
        window.location.href='home.html';
        </SCRIPT>");
        }
        else{      
        echo("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Error in database');
        window.location.href='home.html';
        </SCRIPT>");
        }
    }

?>