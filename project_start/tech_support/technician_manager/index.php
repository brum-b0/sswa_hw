<?php
#require('../model/database.php');
#require('../model/technician_db.php');
require('../model/technician_db_oo.php');
require('../model/technician.php');
require('../model/database_oo.php');


$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_technicians';
    }
}

if ($action == 'list_technicians') {//refactor for oop
    // Get technicians
    #$technicians = get_technicians();
    $technicians = TechnicianDB::getTechnicians();
    // Display the technician list
    #print_r($technicians);
    include('tech_list.php');

} else if ($action == 'delete_technician') {//refactor for oop

    #$technician_ID = filter_input(INPUT_POST, 'techID');
    #delete_technician($technician_ID);
    $techID = filter_input(INPUT_POST, 'techID');//grab techID from delete button
    $technician = TechnicianDB::getTechnician($techID);//get the technician by techID
    TechnicianDB::deleteTechnician($technician);//delete the technicican, passing a technician object
    header("Location: .");//redirect to index.php -> list_technicians

} else if ($action == 'show_add_form') {
    include('tech_add.php');

} else if ($action == 'add_technician') {//refactor for oop

    #$techID = filter_input(INPUT_POST, 'code'); //auto increment
    $firstName = filter_input(INPUT_POST, 'firstName');//grab the post data
    $lastName = filter_input(INPUT_POST, 'lastName');
    $email = filter_input(INPUT_POST, 'email');
    $phone = filter_input(INPUT_POST, 'phone');
    $password = filter_input(INPUT_POST, 'password');
    $techID = 0;//dummy value, actual insert will be auto increment

    $technician = new Technician($techID, $firstName, $lastName, $email, $phone, $password);//create new technician
    TechnicianDB::addTechnician($technician);//add the technician to the database
    header("Location: .");//redirect to index.php
    
 
}

?>