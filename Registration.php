<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ;
    $email = $_POST['email'] ;
    $phonenumber = $_POST['phonenumber'] ;
    $password = $_POST['password'] ;

    $conn = new mysqli('localhost', 'root', '', 'fitness_revolution database');

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO user (name, email, phonenumber, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $name, $email, $phonenumber, $password);

        if ($stmt->execute()) {
            echo "Review successfully submitted!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }

}