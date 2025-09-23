<?php

$createdUsers = [];

require_once "Class/User.php";
require_once "Class/Menus/MenuCreateUser.php";
require_once "Class/Menus/MenuLogin.php";
require_once "Class/Menus/MenuResetPassword.php";
require_once "Class/Menus/MenuShowUser.php";
require_once "Class/UserManager.php";
require_once "Class/Validator.php";

$userManager = new UserManager;
$validator =  new Validator;

$menuOptions = [
        '1' => new MenuCreateUser(),
        '2' => new MenuLogin(),
        '3' => new MenuResetPassword(),
        '4' => new MenuShowUser()
];

function showMenus($menuOptions, $createdUsers, $userManager, $validator): void {
    echo "Escolha uma opção:\n";
    echo "1 - Criar um novo usuário\n";
    echo "2 - Fazer login\n";
    echo "3 - Resetar senha de usuário\n";
    echo "4 - Mostrar usuário cadastrados\n";
    echo "99 - Sair\n";
    $option = (int) readLine();
    
    if(array_key_exists($option, $menuOptions)){
        $menu = $menuOptions[$option];
        $menu->showMenu($createdUsers, $userManager, $validator);
        if($option !== 99){
            showMenus($menuOptions, $createdUsers, $userManager, $validator);
        }
    }
    
    if($option == 99){
        return;
    }
    
    echo "Opção inválida!\n";
        showMenus($menuOptions, $createdUsers, $userManager, $validator);

}

showMenus($menuOptions, $createdUsers, $userManager, $validator);