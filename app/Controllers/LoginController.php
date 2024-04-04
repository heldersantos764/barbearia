<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class LoginController extends BaseController
{
    public function login()
    {
        $userModel = new UserModel();

        if ($this->request->getMethod() === 'post') {
            $username = 'administrador';
            $password = $this->request->getPost('password');

            $user = $userModel->where('username', $username)->first();

            if (!empty($user) && password_verify($password, $user['password'])) {
                $session = session();
                $session->set('isLoggedIn', true);

                return redirect()->to(site_url('dashboard'));
            } else {
                return redirect()->to(site_url('/'))->with('error', 'Senha incorreta.');
            }
        }

        return view('login');
    }

    public function logout()
    {
        $session = session();
        $session->remove('isLoggedIn');

        return redirect()->to(site_url('/'));
    }
}
