<?php
    //This File handles new entries and stores them in the database in a relational format.
    

    //Static stuff
    $servername = "localhost";
    $username = "postmanDB";
    $password = "mucSqq1igiTcEID6";
    $dbName = "guestbook";

    //Collecting data for JSON
    $data = array(  "username"=>$_POST["username"], 
                    "email"=>$_POST["email"], 
                    "message"=>$_POST["message"]);
    //Forming Json
    //to store json a NoSql database should be prefered here - to store JSON in a relational database is not very efficient 
    $dataJson = json_encode($data);

    $postUsername = $_POST["username"];
    $postEmail = $_POST["email"];
    $postMessage = $_POST["message"];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbName);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        header("Location: error.html");
    }

    //SQL STATEMENT FOR JSON - tbd here
    //$sql = "INSERT INTO article_entity VALUES $dataJson";

    $sql = "INSERT INTO articles (username, email, userMessage) VALUES ('$postUsername', '$postEmail', '$postMessage')";

    if ($conn->query($sql) === TRUE) {
        echo "inserted successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: index.php");
?>