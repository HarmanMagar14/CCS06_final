<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $query = "DELETE FROM articles WHERE id = $id";
    
    if ($conn->query($query) === TRUE) {
        echo "Article deleted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
