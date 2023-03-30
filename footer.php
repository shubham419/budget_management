<?php
$host = "localhost";
$dbname = "budget_management";
$port = "5432";
$user = "shubham";
$password = "123";

// Establish connection
$con = pg_connect("host=$host user=$user dbname=$dbname password=$password") or
        die("Unable to connect to database");

// Prepare query
$query = "INSERT INTO categories (category) VALUES ('Books');";

// Execute query
$result = pg_query($con, $query);

if (!$result) {
    // Handle query execution error
    $error = pg_last_error($con);
    die("Error executing query: " . $error);
}

// Close connection
pg_close($con);
?>
