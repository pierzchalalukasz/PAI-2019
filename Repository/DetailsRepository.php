<?php

require_once "Repository.php";
require_once __DIR__.'\..\\Models\\Details.php';

class DetailsRepository extends Repository {

    public function getDetails()
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM full_user_details WHERE user_id = :id
        ');
        $stmt->bindParam(':id', $_SESSION['user_id'], PDO::PARAM_STR);
        $stmt->execute();

        $details = $stmt->fetch(PDO::FETCH_ASSOC);

        if($details == false) {
            return null;
        }

        return new Details(
            $details['details_id'],
            $details['address_id'], 
            $details['phone_number'],
            $details['name'],
            $details['surname'],
            $details['username']
        );
    }

}