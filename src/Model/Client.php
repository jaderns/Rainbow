<?php

namespace App\Model;

class Client
{
    private $email;
    private $password;
    private $name;
    private $address;
    private $createdAt;

    public function __construct(string $email, string $password, string $name, string $address, \DateTimeInterface $created_at)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->address = $address;
        $this->created_at = $created_at;
    }

    public function password(): string 
    {
        return $this->password;
    }

    public function email(): string 
    {
        return $this->email;
    }

    public function name(): string 
    {
        return $this->name;
    }
}
