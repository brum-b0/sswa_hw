<?php
require('../model/database.php');
require('../model/customer_db.php');
require('../model/countries_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'search_customers';
    }
}

if ($action == 'search_customers') {
    // Get customer data
    $customers = get_customers();

    // Display the customer search
    include('customer_search.php');

} else if ($action == 'show_customer_update') {
    $customer_id = filter_input(INPUT_POST, 'customerID', FILTER_VALIDATE_INT);
    $customer = get_customer_by_id($customer_id);
    $countries = get_countries();
    $selected = $customer[0]['countryCode'];
    include('customer_update.php');

} else if ($action == 'search_customers_lname') {
    $lastName = filter_input(INPUT_POST, 'lastName');
    if (empty($lastName)) {
        // default list all
        $customers = get_customers();
        include('customer_search.php');

    } else {
        $customers = get_customers_lname($lastName);
        include('customer_search.php');
    }
    

} else if ($action == 'update_customer') {
    
    $customerID = filter_input(INPUT_POST, 'customerID', FILTER_VALIDATE_INT);
    $fname = filter_input(INPUT_POST, 'firstName');
    $lname = filter_input(INPUT_POST, 'lastName');
    $address = filter_input(INPUT_POST, 'address');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $postalCode = filter_input(INPUT_POST, 'postalCode');
    $countryCode = filter_input(INPUT_POST, 'countryCode');
    $phone = filter_input(INPUT_POST, 'phone');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');



    // Validate the inputs
    if ( empty($customerID) || empty($fname) || empty($lname) || empty($address) || 
        empty($city) || empty($state) || empty($postalCode) ||
        empty($countryCode) || empty($phone) || empty($email) || empty($password)) {
        $error = "Invalid customer data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        update_customer($customerID, $fname, $lname, $address, $city, $state, $postalCode, $countryCode, $phone, $email, $password);
        header("Location: .");
    }
}
?>