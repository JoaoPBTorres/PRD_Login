<?php

require_once "Class/User.php";
require_once "Class/UserManager.php";
require_once "Class/Validator.php";

class MenuLogin{
    
    public function showMenu(array &$createdUsers, $userManager, $validator){
        
        echo "Digite o seu email:";
        $email = readLine();
        echo "Digite sua senha:";
        $password = readLine();

        foreach($createdUsers as $user){
            if($user->getEmail() === $email){
                $userManager->login($password, $email, $createdUsers);
                return;
            }
            echo "Usuário não encontrado.";
        }
    }
}