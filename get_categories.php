<?php
$host = "localhost";
$dbname = "budget_management";
$user = "shubham";
$port = "5432";
$password = "123";

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";

try {
    $conn = new PDO($dsn);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$sql = "SELECT * FROM categories";

// Prepare statement
$stmt = $conn->prepare($sql);

// Execute statement
if ($stmt->execute()) {
    // Get the results as an array of associative arrays
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the results as a JSON object
    echo json_encode($results);
} else {
    echo "Error fetching records: " . $stmt->errorInfo()[2];
}

// Close connection
$conn = null;
?>