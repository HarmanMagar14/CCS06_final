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
        </tr>";
}

echo $output;
?>