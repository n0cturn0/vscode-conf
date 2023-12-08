<?php

// Bootstrap do Winter CMS
require __DIR__ . '/bootstrap/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);

// Registrar o Artisan Console
$artisan = $app->make(\Illuminate\Contracts\Console\Application::class);
$artisan->setName('Winter CMS');

// Seu código para criar um usuário administrador
use RainLab\User\Models\User;
use Backend\Models\User as BackendUser;
use RainLab\User\Models\Settings as UserSettings;

// Criar um novo usuário
$user = new User;
$user->name = 'guto';
$user->email = 'email@example.com';
$user->password = bcrypt('123456789');
$user->save();

// Associar o usuário a um backend user (usuário de administração)
$backendUser = new BackendUser;
$backendUser->login = 'email@example.com';
$backendUser->password = bcrypt('123456789');
$backendUser->is_activated = true;
$backendUser->save();

// Atribuir a função de administrador ao backend user
$backendUser->roles()->attach(UserSettings::get('defaultUserRole'));

// Atribuir a função de administrador ao usuário comum
$user->roles()->attach(UserSettings::get('defaultUserRole'));

// Concluir
echo "Usuário administrador criado com sucesso.\n";
