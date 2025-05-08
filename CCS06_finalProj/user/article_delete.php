<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST["id"]); // cast to int for safety

    $query = "DELETE FROM articles WHERE id = $id";
    
    if ($conn->query($query) === TRUE) {
        echo "Article deleted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
