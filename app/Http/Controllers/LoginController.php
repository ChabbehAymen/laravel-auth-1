<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    private $userName_email;
    private $password;
    private $jsonData;
    public function index()
    {
        if ($this->isUserLoged()) return redirect('/profile');
        return view("login");
    }

    public function preLogin(Request $request)
    {
        $this->getUsers();
        $this->userName_email = $request->input('userName_email');
        $this->password = $request->input('password');
        if ($this->userName_email == 'admin' && $this->password === $this->jsonData['admin']['password']) {
            return $this->loginAsAdmin();
        } else if ($this->userName_email == 'admin' && $this->password !== $this->jsonData['admin']['password']) {
            return redirect('/')
                ->with('error_massage', 'admin password wrong');
        } else {
            if ($this->isUserNameEmailValid() and $this->isPasswordValid()) {
                foreach ($this->jsonData['users'] as $user) {
                    if (($user['email'] == $this->userName_email or $user['user_name'] == $this->userName_email) and $user['password'] === $this->password) {
                        return $this->loginAsUser($user['id']);
                    } else if (($user['email'] == $this->userName_email or $user['user_name'] == $this->userName_email) and $user['password'] !== $this->password) {
                        return redirect('/')
                            ->with('error_massage', 'wrong password');
                    } else {
                        return redirect('/')
                            ->with('error_massage', 'User Not Found');
                    }
                }
            }
        }
    }

    private function getUsers()
    {
        $this->jsonData = json_decode(file_get_contents(resource_path('json/users.json')), true);
    }

    private function isUserLoged()
    {
        // return isset($_SESSION['user_loged']) or isset($_SESSION['as_admin']);
        // return session()->has('as_admin') or session()->has('user_loged');
        return Session::has('as_admin') or Session::has('user_loged');
    }

    private function isUserNameEmailValid()
    {
        return ($this->userName_email !== '' and strlen($this->userName_email) >= 4) and (str_contains($this->userName_email, '@') or str_contains($this->userName_email, '_'));
    }

    private function isPasswordValid()
    {
        return $this->password !== '' and strlen($this->password) >= 6;
    }

    private function loginAsAdmin()
    {
        Session::put('as_admin', true);
        // $_SESSION['as_admin'] = true;
        return $this->navigateToProfile();
    }

    private function loginAsUser($id)
    {
        Session::put('user_loged', $id);
        // $_SESSION['user_loged'] = $id;
        for ($i=0; $i < count($this->jsonData['users']); $i++) { 
            if ($this->jsonData['users'][$i]['id'] === $id) {
                $this->jsonData['users'][$i]['last_session'] = date('l jS \of F Y h:i:s A');
            }
        }
        $fp = fopen(resource_path('json/users.json'), 'w');
        fwrite($fp, json_encode($this->jsonData));
        fclose($fp);
        return $this->navigateToProfile();
    }

    private function navigateToProfile()
    {
        return redirect("/profile");
    }
}
