<?php
    $id = (int)$_POST["id"];

    //Static stuff
    $servername = "localhost";
    $username = "admin";
    $password = "EUDqKAf20uqOr4Sc";
    $dbName = "guestbook";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbName);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        header("Location: error.html");
    }

    $sql = "DELETE FROM articles WHERE id = '$id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "deleted successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: admin.php");
    die();
?>