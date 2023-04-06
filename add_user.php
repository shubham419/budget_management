<?php
$host = "localhost";
$dbname = "budget_management";
$user = "shubham";
$port = "5432";
$password = "123";



// Check if the category value is set in the POST request
if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['password'])) {
    $user_name = $_POST['name'];
    $user_phone = $_POST['phone'];
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
} else {
    die("Category and/or money_spend values are not set.");
}
$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";


try {
    $conn = new PDO($dsn);
    echo "Connected to the $dbname database successfully!";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$sql = "INSERT INTO user_data (user_name, user_phone, user_email, user_password) VALUES (:user_name, :user_phone, :user_email, :user_password)";

// Prepare statement
$stmt = $conn->prepare($sql);
$stmt->bindParam(":user_name", $user_name);
$stmt->bindParam(":user_phone", $user_phone);
$stmt->bindParam(":user_email", $user_email);
$stmt->bindParam(":user_password", $user_password);

// Execute statement
if ($stmt->execute()) {
    echo "Record inserted successfully.";
} else {
    echo "Error inserting record: " . $stmt->errorInfo()[2];
}

// Close connection
$conn = null;


?>
