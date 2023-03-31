<?php
$host = "localhost";
$dbname = "budget_management";
$port = "5432";
$user = "abhi";
$password = "123";


// Establish connection
$con = pg_connect("host=$host user=$user dbname=$dbname password=$password") or
        die("Unable to connect to database");

// Prepare query
$query_categories = "CREATE TABLE categories (                       
    id SERIAL PRIMARY KEY,
    category VARCHAR(255)
  );";

$query_transaction = "CREATE TABLE transaction (                       
    id SERIAL PRIMARY KEY,
    category VARCHAR(255),
    money_spend VARCHAR(255)
  );
  ";

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

// Execute query
// $result = pg_query($con, $query);

$categories = pg_query($con, $query_categories);
$planed_payment = pg_query($con, $query_planed_payment);
$transaction = pg_query($con, $query_transaction);
$premission_categories = pg_query($con, $query_premission_categories);
$premission_categories_id = pg_query($con, $premission_categories_id);
$premission_transaction = pg_query($con, $premission_transaction);
$premission_transaction_id = pg_query($con, $premission_categories_id);
$premission_planed_payment = pg_query($con, $query_planed_payment);
$premission_planed_payment_id = pg_query($con, $premission_planed_payment_id);


// check result

if($categories){
    echo("table of categoris created successfully");
}else{
    echo("error in categoris");
}

if($planed_payment){
    echo("table of  planed_payment successfully");
}else{
    echo("error in planed_payment");
}

if($transaction){
    echo("table of transaction created successfully");
}else{
    echo("error in transaction");
}

if($premission_categories){
    echo("granted permission successfully");
}else{
echo("error in granting permission");
}

if($premission_categories_id){
    echo("granted permission successfully to id_seq");
}else{
    echo("error in granting permission to id_seq");
}


// Close connection
pg_close($con);

?>