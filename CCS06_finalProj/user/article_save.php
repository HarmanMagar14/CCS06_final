<?php
include"../config.php";

$id = $_POST['id'] ?? null;
$title = $_POST['title'];
$content = $_POST['content'];
$source_url = $_POST['source_url'];
$date_published = $_POST['date_published'];
$category = $_POST['category'];

if ($id) {
    $query = "UPDATE articles 
              SET title='$title', content='$content', source_url='$source_url', date_published='$date_published', category='$category' 
              WHERE id=$id";
} else {
    $query = "INSERT INTO articles (title, content, source_url, date_published, category, status) 
              VALUES ('$title', '$content', '$source_url', '$date_published', '$category', 'Pending')";
}

if ($conn->query($query)) {
    // Redirect to user_dashboard.php after successful save
    header("Location: user_dashboard.php");
    exit();
} else {
    echo "Error: " . $conn->error;
}
?>