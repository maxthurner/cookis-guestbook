<?php
    //This file provides the frontend with all entries made in the database in JSON.
    
    //to Secure passwords the best way would be to store the password in a .htaccess file in a not publicly accessible folder.
    //or on an Apache Webserver in a httpd.conf or virtual hosts file.
    //Furthermore this File should be hidden by htaccess so nobody can directly view this file in browser


    $servername = "localhost";
    $username = "postmanDB";
    $password = "mucSqq1igiTcEID6";
    $dbName = "guestbook";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbName);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM articles";
    $result = $conn->query($sql);

    $jsonArray = array();
    if ($result->num_rows > 0) {
      // data of each row
      while($row = $result->fetch_assoc()) {
        //echo "<tr><td>".$row["id"]."</td><td>".$row["username"]." ".$row["email"]."</td></tr>";
        $tempJson =   array('id' => $row["id"], 
                            'username' => $row["username"],
                            'email' => $row["email"],
                            'message' => $row["userMessage"],
                            'timestamp' => $row["timestamp"]);

        array_push($jsonArray, $tempJson);
        //array_push($jsonArray, $row["id"], $row["username"], $row["email"]);
      }
    }
    $conn->close();

    
    header('Content-Type: application/json');
    echo json_encode($jsonArray);

?>