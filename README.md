# Sistema de Usuários e Autenticação em PHP (CLI)

**Disciplina:** Design Patterns & Clean Code  
**Projeto:** Sistema de Usuários e Autenticação  
**Integrantes:** João Pedro Belarmino Torres — RA: 2007848 e João Pedro Duarte Martinez — RA: 1993686

## Descrição

Este projeto implementa um sistema simples de **cadastro, login e reset de senha** em PHP, rodando diretamente no **prompt de comando (CLI)**.  
Ele foi desenvolvido seguindo boas práticas de programação (PSR-12, KISS, DRY) e aplicando conceitos de **POO em PHP**.

## Como rodar o projeto

### 1. Pré-requisitos
- **PHP 8+** instalado na sua máquina.  
  Para verificar, rode no terminal:
  ```bash
  php -v

### 2. Instalação

1. Clone este repositório:

   ```bash
   git clone https://github.com/JoaoPBTorres/Projeto-2_Cadastro_e_Autenticacao_de_Usuarios.git
   cd PRD_Login
   ```
2. Certifique-se de que está dentro da pasta do projeto.

### 3. Executando

No terminal, execute:

```bash
php index.php
```

O programa abrirá o menu interativo no terminal, com as opções de:

* Criar novo usuário
* Fazer login
* Resetar senha
* Listar usuários
* Sair

---

## Funcionalidades Implementadas

1. **Cadastro de Usuário**

   * Valida formato de e-mail.
   * Valida força da senha (mínimo 8 caracteres, 1 número e 1 letra maiúscula).
   * Gera ID único autoincrementado.
   * Evita e-mails duplicados.
   * Armazena senha usando `password_hash`.

2. **Login de Usuário**

   * Valida credenciais fornecidas.
   * Compara senha usando `password_verify`.

3. **Reset de Senha**

   * Atualiza senha existente.
   * Aplica novamente as regras de validação.
   * Substitui pela nova senha com `password_hash`.
  
4. **Listar todos os usuário cadastrados**
   
   * Mostra o ID e o nome de todos os usuários cadastrados.
   * Utilizado para gerenciar os usuários e teste do código.
     
6. **Menu Interativo no Terminal**

   * Usuário escolhe opções pelo teclado.
   * Loop contínuo até selecionar "Sair".

---

## Casos de Uso (Testes)

1. **Cadastro válido**
   Entrada: nome Maria Oliveira, email `maria@email.com`, senha `Senha123`.
   Resultado: usuário cadastrado com sucesso.

2. **Cadastro com e-mail inválido**
   Entrada: nome Pedro, email `pedro@@email`, senha `Senha123`.
   Resultado: mensagem → “E-mail inválido”.

3. **Tentativa de login com senha errada**
   Entrada: email `joao@email.com`, senha `Errada123`.
   Resultado: mensagem → “Credenciais inválidas”.

4. **Reset de senha válido**
   Entrada: id `1`, nova senha `NovaSenha1`.
   Resultado: senha alterada com sucesso.

5. **Cadastro de usuário com e-mail duplicado**
   Entrada: email já existente no array.
   Resultado: mensagem → “E-mail já está em uso”.

---

## Estrutura de Pastas

```
/PRD_Login
│── Class/
│   ├── User.php
│   ├── Menu.php
│   └── Menus/
│       └── MenuCreateUser.php
│       └── MenuLogin.php
│       └── MenuResetPassword.php
│       └── MenuShowUsers.php
│── index.php
│── README.md
