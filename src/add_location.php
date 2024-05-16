<?php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $x = $_POST['x'];
    $y = $_POST['y'];
    $name = $_POST['name'];

    $stmt = $db_handle->prepare("INSERT INTO locations (x, y, name) VALUES (:x, :y, :name)");
    $stmt->bindParam(':x', $x);
    $stmt->bindParam(':y', $y);
    $stmt->bindParam(':name', $name);
    $stmt->execute();

    if ($stmt->affected_rows === 1) {
        echo "Location added successfully.";
    } else {
        echo "Error adding location.";
    }
}
?>
