<?php
require('../model/database.php');
require('../model/customer_db.php');
require('../model/product_db.php');
require('../model/registrations_db.php');

$lifetime = 60 * 60 * 24 *  365;// 1 year in seconds
session_set_cookie_params($lifetime, '/');
session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'login_form';
    }
}

if ($action == 'login_form') {
    if (!isset($_SESSION['email'])) {//skip login page if already logged in
        include('login.php');
    } else {
        header("Location: .?action=login");
    }
    

} else if ($action == 'login') {
    if (!isset($_SESSION['email'])) {
        $_SESSION['email'] = filter_input(INPUT_POST, 'email');//email should be enough
    }
    $customer = get_customer_by_email($_SESSION['email']);
    $products = get_products();
    include('register.php');
    /*$email = filter_input(INPUT_POST, 'email');
    if (empty($email)) {
        $error = 'You must log in before you can register a product.';
        include('../errors/error.php');
    }  else {
            $customer = get_customer_by_email($email);
            $products = get_products();
            #print_r($products);
            #print_r($customer);
            include('register.php');
        }
    */
} else if ($action == 'register') {
    $customerID = filter_input(INPUT_POST, 'customerID');
    $productCode = filter_input(INPUT_POST, 'productCode');
    
    if (empty($customerID) || empty($productCode)) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        
        register_product($customerID, $productCode);
        
        header("Location: .?action=confirm_register&productCode=$productCode");
    }
    # register product post

} else if ($action == 'logout') {//logout 

    unset($_SESSION['email']);//remove email from session
    session_destroy();//destroy session
    header("Location: .?action=login_form");//redirect to login page

} else if ($action == 'confirm_register') {
    include('confirmation.php');
}
?>