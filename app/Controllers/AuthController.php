<?php

namespace App\Controllers;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function loginPost()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set(['user' => $user]);
            return redirect()->to('/welcome');
        } else {
            $session->setFlashdata('error', 'Credenciales inválidas');
            return redirect()->to('/login');
        }
    }

    public function register()
    {
        return view('auth/register');
    }

    public function registerPost()
    {
        $model = new UserModel();

        $avatar = $this->request->getFile('avatar');
        $avatarName = 'default.png';

        if ($avatar->isValid() && !$avatar->hasMoved()) {
            $avatarName = $avatar->getRandomName();
            $avatar->move(FCPATH . 'uploads/avatars/', $avatarName);
        }

        $data = [
            'nombre' => $this->request->getVar('nombre'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'avatar' => $avatarName
        ];

        $model->insert($data);

        $session = session();
        $session->set(['user' => $data]);
        return redirect()->to('/welcome');
    }

    public function welcome()
    {
        $session = session();
        if (!$session->has('user')) {
            return redirect()->to('/login');
        }
        return view('welcome', ['user' => $session->get('user')]);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
