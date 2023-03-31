<?php
$host = "localhost";
$dbname = "budget_management";
$user = "shubham";
$port = "5432";
$password = "123";

// Check if the category and money_spend values are set in the POST request
if (isset($_POST['category']) && isset($_POST['money_spend'])) {
    $category = $_POST['category'];
    $money_spend = $_POST['money_spend'];
} else {
    die("Category and/or money_spend values are not set.");
}

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";

try {
    $conn = new PDO($dsn);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$sql = "INSERT INTO transaction (category, money_spend) VALUES (:category, :money_spend)";

// Prepare statement
$stmt = $conn->prepare($sql);
$stmt->bindParam(":category", $category);
$stmt->bindParam(":money_spend", $money_spend);

// Execute statement
if ($stmt->execute()) {
    echo "Record inserted successfully.";
} else {
    echo "Error inserting record: " . $stmt->errorInfo()[2];
}

// Close connection
$conn = null;
?>
