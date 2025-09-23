<?php

$createdUsers = [];

require_once "Class/User.php";
require_once "Class/Menus/MenuCreateUser.php";
require_once "Class/Menus/MenuLogin.php";
require_once "Class/Menus/MenuResetPassword.php";
require_once "Class/Menus/MenuShowUser.php";

$menuOptions = [
        '1' => new MenuCreateUser(),
        '2' => new MenuLogin(),
        '3' => new MenuResetPassword(),
        '4' => new MenuShowUser()
];

function showMenus($menuOptions, $createdUsers): void {
    echo "Escolha uma opção:\n";
    echo "1 - Criar um novo usuário\n";
    echo "2 - Fazer login\n";
    echo "3 - Resetar senha de usuário\n";
    echo "4 - Mostrar usuário cadastrados\n";
    echo "99 - Sair\n";
    $option = (int) readLine();
    
    if(array_key_exists($option, $menuOptions)){
        $menu = $menuOptions[$option];
        $menu->showMenu($createdUsers);
        if($option != 99){
            showMenus($menuOptions, $createdUsers);
        }
    }

}

showMenus($menuOptions, $createdUsers);