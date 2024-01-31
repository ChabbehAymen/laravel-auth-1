<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{

    private $jsonData;
    public function index(Request $request){
        $this->getJson();
        if ($request->session()->has('as_admin')) {
            return view("dashbord")->with('users', $this->jsonData['users']);
        } else{
            // $userId= $_SESSION['user_loged'];
            $userId = Session::get('user_loged');
            $user = $this->getUserData($userId);
            return view("profile")->with('user', $user);
        }
    }

    private function getJson(){
        $path = resource_path('json/users.json');
        $this->jsonData = json_decode(file_get_contents($path), true);
    }

    private function getUserData($userId){
        foreach($this->jsonData['users'] as $user){
            if($user['id'] === $userId ) return $user;
        }
    }
}
