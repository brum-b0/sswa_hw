<?php
class TechnicianDB {

    public static function getTechnicians() {
        $db = Database::getDB();
        $query = 'SELECT * FROM technicians
                  ORDER BY lastName';
        $statement = $db->prepare($query);
        $statement->execute();
        
        $result = $statement->fetchAll();
        $technicians = array();
        $statement->closeCursor();
        foreach ($result as $row) {
            $technician = new Technician($row['techID'],
                                         $row['firstName'],
                                         $row['lastName'],
                                         $row['email'],
                                         $row['phone'],
                                         $row['password']);
            $technicians[] = $technician;
        }
        return $technicians;
    }
    public static function getTechnician($techID) {
        $db = Database::getDB();
        $query = 'SELECT * FROM technicians
                  WHERE techID = :techID';    
        $statement = $db->prepare($query);
        $statement->bindValue(':techID', $techID);
        $statement->execute();    
        $technician = $statement->fetch();
        $statement->closeCursor();
        $technician = new Technician($technician['techID'],
                                     $technician['firstName'],
                                     $technician['lastName'],
                                     $technician['email'],
                                     $technician['phone'],
                                     $technician['password']);
        return $technician;
    }
    

    public static function deleteTechnician($technician) {//delete by techID
        $db = Database::getDB();

        $query = 'DELETE FROM technicians
                  WHERE techID = :techID';

        $statement = $db->prepare($query);
        $statement->bindValue(':techID', $technician->getTechID());
        $statement->execute();
        $statement->closeCursor();

    }

    public static function addTechnician($technician) {//techID is auto increment, so ignored
        $db = Database::getDB();

        $firstName = $technician->getFirstName();
        $lastName = $technician->getLastName();
        $email = $technician->getEmail();
        $phone = $technician->getPhone();
        $password = $technician->getPassword();

        $query = 'INSERT INTO technicians
                     (firstName, lastName, email, phone, password)
                  VALUES
                     (:firstName, :lastName, :email, :phone, :password)';
        $statement = $db->prepare($query);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $statement->closeCursor();
    }


}   

?>