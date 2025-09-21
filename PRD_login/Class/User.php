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

    public function getName(): string {
        return $this->name;
    }

    public function setEmail(string $email): bool{
        if(empty($email)){
            echo "Email não pode ser vazio! \n";
            return false;
        } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "O email {$email} não é válido! \n";
            return false;
        } else {
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
        if(empty($password)){
            echo "Senha não pode ser vazia! \n";
            return false;
        } 
        
        if(strlen($password) < 8){
            echo "A senha deve ter pelo menos 8 caracteres! \n";
            return false;
        } 
        
        if(!preg_match("#[A-Z]+#", $password)){
            echo "A senha deve ter pelo menos uma letra maiúscula! \n";
            return false;
        }
        
        if(!preg_match("#[0-9]+#", $password)){
            echo "A senha deve ter pelo menos um número! \n";
            return false;
        }
        
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        
        return true;
        
    }

    public function createUser(string $email, string $password, string $name, array $createdUsers): bool {
        if(!$this->setEmail($email) || !$this->validatePassword($password)){
            echo "Erro ao cadastrar usuário \n";
            return false;
        }
        
        foreach($createdUsers as $user){
            if($user->getEmail()=== $email){
                echo "Usuário {$email} já cadastrado! \n";
                return false;
            }
        }

        $this->setName($name);

        echo "Usuário {$email} criado com sucesso! \n";
        return true;
    }

    public function login($password, $email, $createdUsers){

        foreach($createdUsers as $user){
            if($user->getEmail() === $email  && password_verify($password,$user->getPassword())){
                echo "Login realizado com sucesso! \n";
                return;
            }
        }

        echo "Email ou senha inválidos. \n";
        return;
    }

    public function resetPassword($id, $newPassword, $createdUsers){
        foreach($createdUsers as $user){
            if($user->getId() === $id){
                $user->validatePassword($newPassword);
                echo "Senha alterada com sucesso! \n";
                return;
            }
        }

        echo "Usuário não encontrado! \n";
        return;
    }
    
}