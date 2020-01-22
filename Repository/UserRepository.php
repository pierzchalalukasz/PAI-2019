<?php

require_once "Repository.php";
require_once __DIR__.'\..\\Models\\User.php';

class UserRepository extends Repository {

    public function getUser(string $email): ?User 
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM user WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            return null;
        }

        if($user['role_id'] == 2)    {
            $role = ['ROLE_ADMIN', 'ROLE_USER'];
        }   else    {
            $role = ['ROLE_USER'];
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['username'],
            $user['user_id'],
            $role
        );
    }

    public function getUsers(): array
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM user WHERE email != :email;
        ');
        $stmt->bindParam(':email', $_SESSION['id'], PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }

    public function addUser(string $name, string $surname, string $username, string $email, string $hash, int $role=1)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO user (name, surname, username, email, password, role_id) VALUES (:name, :surname, :username, :email, :hash, :role)
        ');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':hash', $hash, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function delete(int $id): void
    {
        try {
            $stmt = $this->database->connect()->prepare('DELETE FROM user
            WHERE user_id = :id;');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }
        catch(PDOException $e) {
            die();
        }
    }

    public function addLog(int $user_id, $date): void
    {
        try {
            $myPDO = $this->database->connect();
            $myPDO->beginTransaction();

            $stmt = $myPDO->prepare('
                INSERT INTO log (user_id, date) VALUES (:user_id, :date)
            ');
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':date', $date);
            $stmt->execute();
            $myPDO->commit();
        }   catch(PDOException $e)  {
            if($myPDO->inTransaction()) {
                $myPDO->rollback();
            }
            die();
        }
    }
}