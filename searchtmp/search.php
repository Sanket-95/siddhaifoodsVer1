<?php
include('includes/db.php'); // Make sure this connects to your DB

if (isset($_POST['query'])) {
    $search = $conn->real_escape_string($_POST['query']);

    $query = "SELECT id, name FROM products WHERE name LIKE '%$search%' LIMIT 5";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = htmlspecialchars($row['id']);
            $name = htmlspecialchars($row['name']);
            echo "<a class='list-group-item list-group-item-action suggestion-item' data-id='$id'>$name</a>";
        }
    } else {
        echo "<div class='list-group-item'>No match found</div>";
    }
}
?>
