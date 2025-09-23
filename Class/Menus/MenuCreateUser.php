<?php

require_once "Class/User.php";
require_once "Class/UserManager.php";
require_once "Class/Validator.php";

class MenuCreateUser{
    
    
    public function showMenu(array &$createdUsers, $userManagement, $validator){
        
        echo "Digite seu nome:";
        $name = readLine();
        echo "Digite o seu email:";
        $email = readLine();
        echo "Digite sua senha:";
        $password = readLine();

        if($userManagement->createUser($email, $password, $name, $createdUsers)){
            echo "Usuário {$email} criado com sucesso!\n";
        }
        
    }
    
}