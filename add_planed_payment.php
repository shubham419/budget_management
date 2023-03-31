<?php
$host = "localhost";
$dbname = "budget_management";
$user = "shubham";
$port = "5432";
$password = "123";

// Check if the category and money_spend values are set in the POST request
if (isset($_POST['object_name']) && isset($_POST['price']) && isset($_POST['emi']) && isset($_POST['duration'])) {
    $object_name = $_POST['object_name'];
    $price = $_POST['price'];
    $emi = $_POST['emi'];
    $duration = $_POST['duration'];
} else {
    die("Category and/or money_spend values are not set.");
}

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";

try {
    $conn = new PDO($dsn);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$sql = "INSERT INTO planed_payment (object_name, price, emi, duration) VALUES (:object_name, :price, :emi, :duration)";

// Prepare statement
$stmt = $conn->prepare($sql);
$stmt->bindParam(":object_name", $object_name);
$stmt->bindParam(":price", $price);
$stmt->bindParam(":emi", $emi);
$stmt->bindParam(":duration", $duration);

// Execute statement
if ($stmt->execute()) {
    echo "Record inserted successfully.";
} else {
    echo "Error inserting record: " . $stmt->errorInfo()[2];
}

// Close connection
$conn = null;
?>
