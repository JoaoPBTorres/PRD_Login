<?php

require_once "Class/Menu.php";
require_once "Class/User.php";

class MenuShowUser extends Menu{

    public function showMenu(array &$createdUsers){
        foreach($createdUsers as $user){
            echo "Id: {$user->getId()} || Nome: {$user->getName()} \n}";
        }
    }
}