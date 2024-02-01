<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SignUpController extends Controller
{

    private $jsonData;
    private $name;
    private $last_name;
    private $birth_date;
    private $email;
    private $user_name;
    private $password;
    private $password_confirmation;

    public function index()
    {
        if($this->isUserLoged()) return redirect('/profile');
        return view("signUp");
    }

    public function preSignUp(Request $request)
    {

        $this->jsonData = json_decode(file_get_contents(resource_path('json/users.json')), true);
        $this->getDataOfForm($request);
        // data validation
        if ($this->isDataValid()) {
            $this->writeToJsonFile([
                'id'=>uniqid(),
                'name'=> $this->name,
                'last_name'=>$this->last_name,
                'birth_date'=>$this->birth_date,
                'email'=> $this->email,
                'user_name'=>$this->user_name,
                'password'=> $this->password,
                'last_session'=>''
            ]);
        }
        // signUp();
        return redirect()->route("login");
    }

    private function getDataOfForm(Request $request)
    {
        $this->name = $request->input("name");
        $this->last_name = $request->input("last_name");
        $this->birth_date = $request->input("birth_date");
        $this->email = $request->input("email");
        $this->user_name = $request->input("user_name");
        $this->password = $request->input("password");
        $this->password_confirmation = $request->input("confirm_password");
    }


    private function writeToJsonFile($user){
        array_push($this->jsonData['users'], $user);
        $fp = fopen(resource_path('json/users.json'), 'w');
        fwrite($fp, json_encode($this->jsonData));
        fclose($fp);
    }

    private function isDataValid()
    {
        return $this->isNameValid() and $this->isLastNameValid()
            and $this->isPasswordValid() and $this->isBirthDateValid()
            and $this->isEmailValid() and $this->isUserNameValid();
    }

    private function isNameValid()
    {
        return $this->name !== '' and strlen($this->name) >= 4;
    }

    private function isLastNameValid()
    {
        return $this->last_name !== '' and strlen($this->last_name) >= 4;
    }

    private function isBirthDateValid()
    {
        return $this->birth_date !== '';
    }

    private function isEmailValid()
    {
        return $this->email !== '' and str_contains($this->email, '@');
    }

    private function isUserNameValid()
    {
        return $this->user_name !== '' and str_contains($this->user_name, '_');
    }

    private function isPasswordValid()
    {
        return ($this->password_confirmation !== '' and $this->password !== '')
            and (strlen($this->password_confirmation) >= 6 and strlen($this->password) >= 6)
            and ($this->password === $this->password_confirmation);
    }

    private function isUserLoged()
    {
        // return isset($_SESSION['user_loged']) or isset($_SESSION['as_admin']);
        // return session()->has('as_admin') or session()->has('user_loged');
        return Session::has('as_admin') or Session::has('user_loged');
    }

}
