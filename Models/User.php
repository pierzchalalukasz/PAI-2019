<?php

class User {
    private $id;
    private $email;
    private $password;
    private $name;
    private $surname;
    private $role;

    public function __construct(
        string $email,
        string $password,
        string $name,
        string $surname,
        string $username,
        int $id = null,
        array $role
    ) {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->username = $username;
        $this->id = $id;
        $this->role = $role;
    }

    public function getId(): int 
    {
        return $this->id;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getRole(): array
    {
        return $this->role;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getUsername(): string
    {
        return $this->username;
    }
}