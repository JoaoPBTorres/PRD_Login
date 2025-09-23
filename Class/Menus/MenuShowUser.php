<?php

require_once "Class/User.php";
require_once "Class/UserManager.php";
require_once "Class/Validator.php";

class MenuShowUser {

    public function showMenu(array &$createdUsers, $UserManager, $Validator){
        if(empty($createdUsers)){
            echo "Não existem usuários criados.";
            return;
        }

        foreach($createdUsers as $user){
            echo "Id: {$user->getId()} || Nome: {$user->getName()} \n";
        }
    }
}