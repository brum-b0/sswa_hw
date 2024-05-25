<?php
function get_customers() {
    global $db;
    $query = 'SELECT * FROM customers
              ORDER BY customerID';
    $statement = $db->prepare($query);
    $statement->execute();
    $customers = $statement->fetchAll();
    return $customers;    
}

function update_customer($customerID, $fname, $lname, $address, $city, $state, $postalCode, $countryCode, $phone, $email, $password) {
    global $db;
    $query = 'UPDATE customers
              SET firstName = :fname,
                  lastName = :lname,
                  address = :address,
                  city = :city,
                  state = :state,
                  postalCode = :postalCode,
                  countryCode = :countryCode,
                  phone = :phone,
                  email = :email,
                  password = :password
               WHERE customerID = :customerID';
    $statement = $db->prepare($query);
    $statement->bindValue(':fname', $fname);
    $statement->bindValue(':lname', $lname);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':postalCode', $postalCode);
    $statement->bindValue(':countryCode', $countryCode);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':customerID', $customerID);
    $statement->execute();
    $statement->closeCursor();
}
function get_customers_lname($lastName) {
    global $db;
    $query = 'SELECT * FROM customers
              WHERE lastName = :lastName
              ORDER BY customerID';
    $statement = $db->prepare($query);
    $statement->bindValue(':lastName', $lastName);
    $statement->execute();
    $customers = $statement->fetchAll();
    $statement->closeCursor();
    return $customers;
}
function get_customer_by_id($customer_id) {
    global $db;
    $query = 'SELECT * FROM customers
              WHERE customerID = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->execute();
    $customer = $statement->fetchAll();
    $statement->closeCursor();
    return $customer;
}
function get_customer_by_email($email) {
    global $db;
    $query = 'SELECT * FROM customers WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $customer = $statement->fetch();
    $statement->closeCursor();
    return $customer;
}

?>