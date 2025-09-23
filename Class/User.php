<?php

class User{

    private int $id;
    private string $email;
    private string $password;
    private string $name;

    public function setId(int $id): void{
        $this->id = $id;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setName(string $name): void {
        if(empty($name)){
            echo "O nome não pode ser vazio. \n";
        } else {
            $this->name = $name;
        }
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setPassword(string $password): void{
        $this->password = $password;
    }
    
    public function getName(): string {
        return $this->name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    
    
}