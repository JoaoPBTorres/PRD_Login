<?php

class User 
{
    private array $users = [];

    public function createUser(string $name, string $email, string $password): bool {
        $nameOk = $this->validateName($name);
        if ($nameOk != true) {
            return $nameOk;
        }

        $emailOk = $this->validateEmail($email);
        if ($emailOk != true) {
            return $emailOk;
        }

        $passwordOk = $this->validatePassword($password);
        if ($passwordOk != true) {
            return $passwordOk;
        }

        $this->users[] = ['name' => $name, 'email' => $email, 'password' => $password];
        return true;
    }

    public function login(): bool {
        
    }

    private function validateName($name): string | bool {
        if (empty($name)) {
            return "Nome é obrigatório";
        }
        if (strlen($name) < 2) {
            return "Nome deve ter pelo menos 2 caracteres";
        }
        if (strlen($name) > 100) {
            return "Nome deve ter no máximo 100 caracteres";
        }
        if (!preg_match('/^[a-zA-ZÀ-ÿ\s]+$/', $name)) {
            return "Nome deve conter apenas letras e espaços";
        }

        return true;
    }

    private function validateEmail($email): string | bool {
        if (empty($email)) {
            return "Email é obrigatório";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Email inválido";
        }
        if (strlen($email) > 255) {
            return "Email muito longo";
        }

        $emailExists = false;
        foreach ($this->users as $user) {
            if ($user['email'] === $email) {
                $emailExists = true;
                break;
            }
        }

        if ($emailExists) {
            return "Email já está em uso";
        }

        return true;
    }

    private function validatePassword($password): string | bool {
        if (empty($password)) {
            return "Senha é obrigatória";
        }

        if (strlen($password) < 8) {
            return "Senha deve ter pelo menos 8 caracteres";
        }

        if (!preg_match('/[A-Z]/', $password)) {
            return "Senha deve ter pelo menos uma letra maiúscula";
        }

        if (!preg_match('/[0-9]/', $password)) {
            return "Senha deve ter pelo menos um número";
        }

        return true;
    }
}