<?php
require 'database.php';

$stmt = $db_handle->prepare("SELECT * FROM locations");
$stmt->execute();
$locations = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($locations);
?>
