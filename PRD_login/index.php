<?php

require_once 'User.php';
$userSystem = new User();

echo "=== Caso 1 — Cadastro válido ===\n";
$result1 = $userSystem->createUser("Maria Oliveira", "maria@email.com", "Senha123");
echo "Resultado: " . ($result1 === true ? "usuário cadastrado com sucesso" : $result1) . "\n\n";

echo "=== Caso 2 — Cadastro com e-mail inválido ===\n";
$result2 = $userSystem->createUser("Pedro", "", "Senha123");
echo "Resultado: " . ($result2 === true ? "usuário cadastrado com sucesso" : $result2) . "\n\n";

echo "=== Caso 3 — Tentativa de login com senha errada ===\n";

$userSystem->createUser("Joao Silva", "joao@email.com", "SenhaCorreta123");

$result3 = $userSystem->login("joao@email.com", "Errada123");
echo "Resultado: " . ($result3 === true ? "login bem-sucedido" : $result3) . "\n\n";

echo "=== Caso 4 — Reset de senha válido ===\n";

$mariaId = $userSystem->getUserIdByEmail("maria@email.com");
if ($mariaId !== null) {
    $result4 = $userSystem->resetPassword($mariaId, "NovaSenha1");
    echo "Resultado: " . ($result4 === true ? "senha alterada com sucesso" : $result4) . "\n\n";
} else {
    echo "Resultado: Usuário não encontrado para reset de senha\n\n";
}

echo "=== Caso 5 — Cadastro de usuário com e-mail duplicado ===\n";
$result5 = $userSystem->createUser("Maria Oliveira", "maria@email.com", "Senha123");
echo "Resultado: " . ($result5 === true ? "usuário cadastrado com sucesso" : $result5) . "\n\n";

echo "Total de usuários cadastrados: " . $userSystem->getUserCount() . "\n";