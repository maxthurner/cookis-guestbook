<?php

    $id = (int)$_POST["id"];
    $like = (int)$_POST["like"];

    //Static stuff
    $servername = "localhost";
    $username = "postmanDB";
    $password = "mucSqq1igiTcEID6";
    $dbName = "guestbook";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbName);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        header("Location: error.html");
    }

    if($like == 1){
        $sql = "UPDATE articles SET likes = likes +1 WHERE id='$id'";
    }else{
        $sql = "UPDATE articles SET likes = likes -1 WHERE id='$id'";
    }
    

    if ($conn->query($sql) === TRUE) {
        echo "inserted successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: index.html");
    die();
?>