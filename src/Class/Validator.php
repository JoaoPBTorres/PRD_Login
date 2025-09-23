<?php

require_once "Class/User.php";

class Validator{

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
        
        return true;
    }

    public function validateEmail(string $email): bool{
        if(empty($email)){
            echo "Email não pode ser vazio! \n";
            return false;
        }
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "O email {$email} não é válido! \n";
            return false;
        }
        return true;
    }

    public function getUserByEmail(&$createdUsers){
        foreach($createdUsers as $user){
            if($user->getEmail()=== $email){
                return $user;
            }
        }
    }

}