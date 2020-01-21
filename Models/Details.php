<?php

class Details {
    private $id;
    private $id_address;
    private $phone_number;
    private $name;
    private $surname;
    private $username;

    public function __construct(
        int $id,
        int $id_address,
        int $phone_number,
        string $name,
        string $surname,
        string $username
    ) {
        $this->id = $id;
        $this->id_address = $id_address;
        $this->phone_number = $phone_number;
        $this->name = $name;
        $this->surname = $surname;
        $this->username = $username;
    }

    public function getId(): int 
    {
        return $this->id;
    }

    public function getIdAddress(): string
    {
        return $this->id_address;
    }

    public function getPhoneNumber(): string
    {
        return $this->phone_number;
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