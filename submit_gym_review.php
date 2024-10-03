<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $title = $_POST['title'] ?? '';
    $cleanliness = $_POST['cleanliness'] ?? '';
    $comment_gym = $_POST['comment_gym'] ?? '';
    var_dump($_POST);

    // Database connection (update credentials as necessary)
    $conn = new mysqli('localhost', 'root', '', 'fitness_revolution database');

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    } else {
        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("INSERT INTO gym_review (name, title, cleanliness, comment) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $title, $cleanliness, $comment_gym);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Review successfully submitted!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
}
?>
