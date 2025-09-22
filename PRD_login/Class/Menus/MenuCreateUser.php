<?php

require_once "Class/User.php";

class MenuCreateUser{
    
    
    public function showMenu(array &$createdUsers){
        
        echo "Digite seu nome:";
        $name = readLine();
        echo "Digite o seu email:";
        $email = readLine();
        echo "Digite sua senha:";
        $password = readLine();

        $user = new User();
        $id = count($createdUsers);
        $user->setId($id);

        $user->createUser($email, $password, $name, $createdUsers);
        $createdUsers[] = $user;
        
    }
    
}