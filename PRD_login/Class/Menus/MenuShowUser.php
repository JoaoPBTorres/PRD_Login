<?php

require_once "Class/User.php";

class MenuShowUser{

    public function showMenu(array &$createdUsers){
        if(empty($createdUsers)) {
            echo "Não existem usuários cadastrados.";
            return;
        }

        foreach($createdUsers as $user){
            echo "Id: {$user->getId()} || Nome: {$user->getName()} \n";
        }
    }
}