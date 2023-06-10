<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $model = new UserModel();
        $username = request()->getPost('username');
        $email = request()->getPost('email');
        $password = request()->getPost('password');
        $dataUser = $model->where('username', $username)->orWhere('email', $email)->first();

        if ($dataUser) {
            if (password_verify($password, $dataUser['password'])) {
                session()->set([
                    'username' => $dataUser['username'],
                    'email' => $dataUser['email'],
                    'log_in' => TRUE
                ]);
                session()->setFlashdata('success', 'Berhasil Login');
                return redirect()->to(base_url('/'));
            } else {
                session()->setFlashdata('error', 'Password Salah');
                return redirect()->to(base_url('/login'));
            }
        } else {
            session()->setFlashdata('error', 'Username Tidak Ditemukan');
            return redirect()->to(base_url('/login'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/login'));
    }
}