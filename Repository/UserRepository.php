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

        if($user['role'] == 'ROLE_ADMIN')    {
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

    public function getUsers(): array {
        
        // $result = [];
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM user WHERE email != :email;
        ');
        $stmt->bindParam(':email', $_SESSION['id'], PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // foreach ($users as $user) {
        //     $result[] = new User(
        //         $user['email'],
        //         $user['password'],
        //         $user['name'],
        //         $user['surname'],
        //         $user['username'],
        //         $user['user_id']
        //     );
        // }
        return $users;
    }

    public function addUser(string $name, string $surname, string $username, string $email, string $hash, string $role="ROLE_USER")
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO user (name, surname, username, email, password, role) VALUES (:name, :surname, :username, :email, :hash, :role)
        ');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':hash', $hash, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);
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
}