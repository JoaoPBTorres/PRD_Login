<?php

class User{

    private int $id;
    private string $email;
    private string $password;
    private string $name;
    private array $createdUsers = [];
    

    // public function __construct(int $id, string $email, string $password, string $name) {
        
    //     $this->id = $id;
    //     $this->email = $email;
    //     $this->password = $password;
    //     $this->name = $name;
    // } 

    public function setId(int $id): void{
        if($id < 0){
            echo "O Id não pode ser menor do que 0!";
        } else {
            $this->id = $id;
        }
    }

    public function getId(): int {
        return $this->id;
    }

    public function setName(string $name): void {
        if(empty($name)){
            echo "O nome não pode ser vazio.";
        } else {
            $this->name = $name;
        }
    }

    public function getName(): string {
        return $this->name;
    }

    public function setEmail(string $email): bool{
        if(empty($email)){
            echo "Email não pode ser vazio!";
            return false;
        } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "O email não é válido!";
            return false;
        } else {
            echo"Email válido <br> ";
            $this->email = $email;
            return true;
        }
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function validatePassword($password): bool {
        echo "Senha {$password}";
        if(empty($password)){
            echo "Senha não pode ser vazia!";
            return false;
        } 
        
        if(strlen($password) < 8){
            echo "A senha deve ter pelo menos 8 caracteres!";
            return false;
        } 
        
        if(!preg_match("#[A-Z]+#", $password)){
            echo "A senha deve ter pelo menos uma letra maiúscula!";
            return false;
        }
        
        if(!preg_match("#[0-9]+#", $password)){
            echo "A senha deve ter pelo menos um número!";
            return false;
        }
        
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        echo "Senha criptografada: {$this->password}";
        return true;
        
    }

    function createUser(int $id, string $email, string $password, string $name){
        if(!setEmail($email) or !validatePassword($password)){
            echo "Erro ao cadastrar usuário";
        }elseif(isset($email, $createdUsers)){
            echo "Usuário já está cadastrado!";
        } else {
            setId($id);
            setName($name);
            array_push($createdUsers, $user);
            echo "Usuário criado com sucesso!";
        }
    }
    
}