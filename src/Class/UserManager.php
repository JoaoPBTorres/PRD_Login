<?php

require_once "Class/User.php";
require_once "Class/Validator.php";

class UserManager extends Validator {

    public function createUser(string $email, string $password, string $name, array &$createdUsers) : bool {
        $user = new User();
        $user->setName($name);

        if(!$this->validateEmail($email) || !$this->validatePassword($password)){
            echo "Erro ao cadastrar usuário \n";
            return false;
        }
        
        $user->setEmail($email);
        $id = count($createdUsers);
        $user->setId($id);
        $user->setPassword(password_hash($password, PASSWORD_DEFAULT));
        $createdUsers[] = $user;

        return true;
    }

    public function login($password, $email, $createdUsers){

        foreach($createdUsers as $user){
            if($user->getEmail() === $email  && password_verify($password, $user->getPassword())){
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
                if($this->validatePassword($newPassword)){
                    $user->setPassword(password_hash($newPassword, PASSWORD_DEFAULT));
                    echo "Senha alterada com sucesso! \n";
                    return;
                }
            }
        }

        echo "Usuário não encontrado! \n";
        return;
    }
}