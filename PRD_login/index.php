<?php

$createdUsers = [];

require_once "Class/User.php";
require_once "Class/Menus/MenuCreateUser.php";
require_once "Class/Menus/MenuLogin.php";
require_once "Class/Menus/MenuResetPassword.php";
require_once "Class/Menus/MenuShowUser.php";

// $userJoao = new User();

// if($userJoao->createUser(0, "joao@teste.com", "1234Abcd", "João", $createdUsers)){
//    $createdUsers[] = $userJoao;
// }

// $userLucas = new User();
// if($userLucas->createUser(1, "lucas@teste", "12345678Ab", "Lucas", $createdUsers)){
//     $createdUsers[] = $userLucas;
// }

// $userJoao2 = new User();
// if($userLucas->createUser(1, "joao@teste.com", "12345678Ab", "Lucas", $createdUsers)){
//     $createdUsers[] = $userLucas;
// }

// function listUsers(array $createdUsers): void {
//     foreach($createdUsers as $user){
//         echo "Usuário cadastrado: {$user->getName()} <br>";
//     }
// }

// listUsers($createdUsers);

// $userJoao->Login("1234Abcd", "joao@teste.com", $createdUsers);
// $userLucas->Login("1234567Ab", "lucas@teste.com", $createdUsers);

// $userJoao->resetPassword(0, "12345aBcd", $createdUsers);

// $userJoao->Login("1234Abcd", "joao@teste.com", $createdUsers);

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
        if($option < 99){
            showMenus($menuOptions, $createdUsers);
        }
    }

}

showMenus($menuOptions, $createdUsers);