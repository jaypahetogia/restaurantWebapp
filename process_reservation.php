<?php

$db = new mysqli("localhost", "root", "", "sonic_dessert_db");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Retrieve and sanitize input
    $customerName = $db->real_escape_string($_POST['customer_name']);
    $email = $db->real_escape_string($_POST['email']);
    $phoneNumber = $db->real_escape_string($_POST['phone_number']);
    $numberOfGuests = $db->real_escape_string($_POST['number_of_guests']);
    $dietaryRestrictions = $db->real_escape_string($_POST['dietary_restrictions']);
    $preDrinksOrder = $db->real_escape_string($_POST['pre_drinks_order']);
    $tableNumber = $db->real_escape_string($_POST['table_number']);

    //SQL statement
    $stmt = $db->prepare("INSERT INTO reservations (customer_name, email, phone_number, number_of_guests, dietary_restrictions, pre_drinks_order, table_number) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssisss", $customerName, $email, $phoneNumber, $numberOfGuests, $dietaryRestrictions, $preDrinksOrder, $tableNumber);

    //Execute query
    if ($stmt->execute()) {
        echo "Reservation successfully made.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$db->close();
?>