<?php

require_once "Class/User.php";

class MenuResetPassword {

    public function showMenu(array &$createdUsers){
        echo "Digite o seu email:";
        $email = readLine();
        
        foreach($createdUsers as $user){
            if($user->getEmail() === $email){
                echo "Digite a nova senha:";
                $newPassword = readLine();
                $user->resetPassword($user->getId(), $newPassword, $createdUsers);
                return;
            }
        }
        echo "Usuário não encontrado.";
        return;
    }
}