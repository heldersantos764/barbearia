<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $session = session();

        if (!$session->has('isLoggedIn') || $session->get('isLoggedIn') !== true) {
            return view('Login');
        }

        return redirect()->to(site_url('dashboard'));
    }
}
