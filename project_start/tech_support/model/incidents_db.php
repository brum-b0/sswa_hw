<?php

function create_incident($customerID, $productCode, $title, $description) {
    global $db;
    $query = 'INSERT INTO incidents#incidentID is auto-incremented, techID can be null (assigned later), likewise for dateClosed.
                 (customerID, productCode, title, description, dateOpened)
              VALUES
                 (:customerID, :productCode, :title, :description, NOW())';#dateOpened is NOW(), on insert into db
    $statement = $db->prepare($query);
    $statement->bindValue(':customerID', $customerID);
    $statement->bindValue(':productCode', $productCode);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->execute();
    $statement->closeCursor();
}