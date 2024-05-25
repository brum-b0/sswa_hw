<?php 
require('../model/database.php');
require('../model/customer_db.php');#for customer email & id
require('../model/incidents_db.php');# insert into incidents
require('../model/product_db.php');# for product names and codes

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'customer_get';# default to get customer by email
    }
}

switch ($action) {# this time I did a switch :~)

    case 'customer_get':#straight-forward
        include('customer_get.php');
        break;

    case 'create_incident':#grab customer data by email, as well as products and show the create incident form
        $email = filter_input(INPUT_POST, 'email');

        if(empty($email)) {#empty check
            $error = 'You must enter an email address.';
            include('../errors/error.php');

        } else {
            $customer = get_customer_by_email($email);#grab customer data
            $products = get_products();#grab product data
            #echo '<pre>';#debug
            #print_r($products);#debug
            #print_r($customer);#debug
            #echo '</pre>';#debug
            
            include('create_incident.php');
        }
        
        break;
    
    case 'confirm':# insert incident to db
        $customerID = filter_input(INPUT_POST, 'customerID');# need customerID for insert
        $productCode = filter_input(INPUT_POST, 'productCode');# need productCode for insert
        $title = filter_input(INPUT_POST, 'title');# need title for insert
        $description = filter_input(INPUT_POST, 'description');# need description for insert
        
        if (empty($customerID) || empty($productCode) || empty($title) || empty($description)) {
            $error = "Invalid incident data. Check all fields and try again.";
            include('../errors/error.php');
        } else {
            create_incident($customerID, $productCode, $title, $description);# see incidents_db.php
            include('confirmation.php');
        }

        
        break;
}
?>