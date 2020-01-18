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

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['username']
        );
    }

    public function getUsers(): array {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM user
        ');
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $user) {
            $result[] = new User(
                $user['email'],
                $user['password'],
                $user['name'],
                $user['surname'],
                $user['id']
            );
        }

        return $result;
    }

    public function addUser(string $name, string $surname, string $username, string $email, string $hash)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO user (name, surname, username, email, password) VALUES (:name, :surname, :username, :email, :hash)
        ');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':hash', $hash, PDO::PARAM_STR);
        $stmt->execute();
    }
}