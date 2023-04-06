<?php
$host = "localhost";
$dbname = "budget_management";
$port = "5432";
$user = "abhi";
$password = "123";

// Establish connection
$con = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password")
        or die("Unable to connect to database");

// Prepare queries
$query_categories = "CREATE TABLE categories (
    id SERIAL PRIMARY KEY,
    category VARCHAR(255)
);";

$query_transaction = "CREATE TABLE transaction (                       
    id SERIAL PRIMARY KEY,
    category VARCHAR(255),
    money_spend VARCHAR(255)
);";

$query_planed_payment = "CREATE TABLE planed_payment (                       
    id SERIAL PRIMARY KEY,
    object_name VARCHAR(255),
    price VARCHAR(255),
    emi VARCHAR(255),
    duration VARCHAR(255)
);";

$query_premission_categories = "GRANT ALL PRIVILEGES ON TABLE categories TO abhi;";
$query_premission_categories_id = "GRANT ALL PRIVILEGES ON TABLE categories_id_seq TO abhi;";
$query_premission_transaction = "GRANT ALL PRIVILEGES ON TABLE transaction TO abhi;";
$query_premission_transaction_id = "GRANT ALL PRIVILEGES ON TABLE transaction_id_seq TO abhi;";
$query_premission_planed_payment = "GRANT ALL PRIVILEGES ON TABLE planed_payment TO abhi;";
$query_premission_planed_payment_id = "GRANT ALL PRIVILEGES ON TABLE planed_payment_id_seq TO abhi;";

// Execute queries
$result_categories = pg_query($con, $query_categories);
$result_transaction = pg_query($con, $query_transaction);
$result_planed_payment = pg_query($con, $query_planed_payment);
$result_premission_categories = pg_query($con, $query_premission_categories);
$result_premission_categories_id = pg_query($con, $query_premission_categories_id);
$result_premission_transaction = pg_query($con, $query_premission_transaction);
$result_premission_transaction_id = pg_query($con, $query_premission_transaction_id);
$result_premission_planed_payment = pg_query($con, $query_premission_planed_payment);
$result_premission_planed_payment_id = pg_query($con, $query_premission_planed_payment_id);

// Check results
if ($result_categories && $result_premission_categories && $result_premission_categories_id) {
    echo "Table categories and permissions created successfully\n";
} else {
    echo "Error creating table categories or permissions\n";
}

if ($result_transaction && $result_premission_transaction && $result_premission_transaction_id) {
    echo "Table transaction and permissions created successfully\n";
} else {
    echo "Error creating table transaction or permissions\n";
}

if ($result_planed_payment && $result_premission_planed_payment && $result_premission_planed_payment_id) {
    echo "Table planed_payment and permissions created successfully\n";
} else {
    echo "Error creating table planed_payment or permissions\n";
}

// Close connection
pg_close($con);
