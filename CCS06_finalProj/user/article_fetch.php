<?php
include '../config.php';

// Query the articles table
$query = "SELECT * FROM articles ORDER BY id DESC";
$result = $conn->query($query);

if (!$result) {
    die("Error fetching articles: " . $conn->error);
}

$output = "";
while ($row = $result->fetch_assoc()) {
    $output .= "
        <tr>
                <td>{$row['id']}</td>
                <td>{$row['title']}</td>
                <td>{$row['content']}</td>
                <td>{$row['category']}</td>
                <td>{$row['date_published']}</td>
                <td>{$row['status']}</td>
                <td>
                <button class='btn btn-warning btn-sm editBtn' data-id='{$row['id']}' data-title='{$row['title']}' data-content='{$row['content']}' data-category='{$row['category']}'>Edit</button>
                <button class='btn btn-danger btn-sm deleteBtn' data-id='{$row['id']}'>Delete</button>
                </td>
        </tr>";
}

echo $output;
?>