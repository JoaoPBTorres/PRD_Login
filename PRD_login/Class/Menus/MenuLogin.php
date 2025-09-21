<?php

require_once "Class/Menu.php";
require_once "Class/User.php";

class MenuLogin extends Menu{
    
    public function showMenu(array &$createdUsers){
        
        echo "Digite o seu email:";
        $email = readLine();
        echo "Digite sua senha:";
        $password = readLine();

        foreach($createdUsers as $user){
            if($user->getEmail() === $email){
                $user->login($password, $email, $createdUsers);
                return;
            }
            echo "Usuário não encontrado.";
        }
    }
}