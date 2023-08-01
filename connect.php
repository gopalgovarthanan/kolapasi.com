<?php
    $email = $_POST['email'];
    $password = $_POST['password'];

    //database connection

    $conn = new mysqli('localhost','root','','nec');
    if($conn->connect_error)
    {
        die('connection failed : '.$conn->connect_error);
    }
    else
    {
        $stmt = $conn->prepare("insert into spdg(email,password)
        values(?,?)");
        $stmt->bind_param("ss",$email,$password);
        $stmt->execute();
        echo "registration successfully....";
        include 'b.html';
        $stmt->close();
        $conn->close();
        exit();
    }