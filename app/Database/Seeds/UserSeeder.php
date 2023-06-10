<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        $model = new UserModel();

        $model->insert([
            'username' => 'annisa_mghfrah',
            'email' => 'annisa.mghfrah@gmail.com',
            'password' => password_hash('nisa', PASSWORD_DEFAULT)
        ]);
    }
}