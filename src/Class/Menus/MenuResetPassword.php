<?php

require_once "Class/User.php";
require_once "Class/UserManager.php";
require_once "Class/Validator.php";

class MenuResetPassword {

    public function showMenu(array &$createdUsers, $userManager, $validator){
        echo "Digite o seu email:";
        $email = readLine();
        
        foreach($createdUsers as $user){
            if($user->getEmail() === $email){
                echo "Digite a nova senha:";
                $newPassword = readLine();
                $userManager->resetPassword($user->getId(), $newPassword, $createdUsers);
                return;
            }
        }
        echo "Usuário não encontrado.";
        return;
    }
}