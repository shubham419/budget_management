<?php
$host = "localhost";
$dbname = "budget_management";
$user = "shubham";
$port = "5432";
$password = "123";

// Check if the category value is set in the POST request
if (isset($_POST['category'])) {
    $category = $_POST['category'];
} else {
    die("Category value is not set.");
}

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";


try {
    $conn = new PDO($dsn);
    echo "Connected to the $dbname database successfully!";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$sql = "DELETE FROM categories WHERE category = :category";

// Prepare statement
$stmt = $conn->prepare($sql);
$stmt->bindParam(":category", $category);

// Execute statement
if ($stmt->execute()) {
    echo "Record inserted successfully.";
} else {
    echo "Error inserting record: " . $stmt->errorInfo()[2];
}

?>