<?php
    session_start();
    $host = "localhost:3306";  
    $db_user = "root";  
    $db_password = "";  
    $db_name = "spa"; 

    $username = $_POST['username'];
    $projectName = $_POST['proj_name'];

     //Database connection
    $con = mysqli_connect($host,$db_user,$db_password,$db_name);
    
    
    if($con->connect_error)
    {
        echo "$con->connect-error";
        die("Connection Failed :".$con->connect_error);
    }else
    {

        $s = "insert into project_status(username,project_name,status) values ('$username','$projectName','Selected Project')";
        $result = mysqli_query($con,$s);

        $s1 = "update project_list set status='selected' where project_name='$projectName'";
        $result1 = mysqli_query($con,$s1);


        if($result && $result1)
        {
            echo("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Project Selection Updated!');
        window.location.href='status.html';
        </SCRIPT>");
        }
        else if($result && !$result1){      
        echo("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Enter The Exact Project Name As It Is Case Sensitive');
        window.location.href='home.html';
        </SCRIPT>");
        }
        else{
             echo("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Error in database side or these values are already present in database');
        window.location.href='home.html';
        </SCRIPT>");
        }
    }

?>