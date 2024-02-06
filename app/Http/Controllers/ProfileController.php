<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{

    private $jsonData;
    private $userId;

    public function index(Request $request)
    {
        $this->getJson();
        if ($request->session()->has('as_admin')) {
            return view("dashbord")->with('users', $this->jsonData['users']);
        } else {
            // $userId= $_SESSION['user_loged'];
            $this->userId = Session::get('user_loged');
            $user = $this->getUserData($this->userId);
            return view("profile")->with('user', $user);
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }

    private function getJson(): void
    {
        $path = resource_path('json/users.json');
        $this->jsonData = json_decode(file_get_contents($path), true);
    }

    private function getUserData($userId)
    {
        foreach ($this->jsonData['users'] as $user) {
            if ($user['id'] === $userId) return $user;
        }
    }

    public function updateUserData(Request $request)
    {
        $last_name = $request->input('last-name');
        $first_name = $request->input('first-name');
        $birth_date = $request->input('birth-date');
        $password = $request->input('password');
        $this->getJson();
        if ($this->isUpdatedDataValid($first_name, $last_name, $birth_date, $password)) {
            $this->updateUserInDb($first_name, $last_name, $birth_date, $password);
        }
        return redirect('/profile');
    }

    private function isUpdatedDataValid(string $first_name, string $last_name, string $birth_date, string $password): bool
    {
        return ($first_name !== '' and $last_name !== '' and $birth_date !== '' and $password !== '') and
            (strlen($first_name) > 3 and strlen($last_name) > 3);
    }

    private function updateUserInDb(string $first_name, string $last_name, string $birth_date, string $password): void
    {
        foreach ($this->jsonData['users'] as $user) {
            if ($user['id'] === $this->userId) {
                $user['name'] = $first_name;
                $user['last_name'] = $last_name;
                $user['birth_date'] = $birth_date;
                $user['password'] = $password;
                $this->saveModifications();
            }
        }
    }

    private function saveModifications(): void
    {
        $fp = fopen(resource_path('json/users.json'), 'w');
        fwrite($fp, json_encode($this->jsonData));
        fclose($fp);
    }

}
