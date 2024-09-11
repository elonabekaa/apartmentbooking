<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\User;
use \Core\View;
use \Core\Controller;


class AuthController extends Controller
{

    public function homePage(){

        $user = '';
        View::renderTemplate('HomePage/index.html',['user'=>$user]);
    }

    public function login(){

        $session = Session::getInstance();
        $message = $session->message(); // Merr mesazhin nga sesioni
    
        View::renderTemplate('Users/login.html', [
            'message' => $message // Dërgoje mesazhin në shabllon
        ]);
    }

    public function message(){

    if (isset($_SESSION['message'])) {
        $msg = $_SESSION['message'];
        unset($_SESSION['message']); // Fshije mesazhin pasi ta lexosh
        return $msg;
    }
    return '';

   }

   public function store(){

    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = User::where('email', $email)->where('password', $password)->latest()->first();
    $session = Session::getInstance();

    if ($user) {
        $session->login($user);
        header('Location: /dashboard');
        exit;
    }

    $session->message("Your email or password is incorrect");
    header('Location: /login');
    exit;
    }

    public function logout(){
    $session = Session::getInstance();
    if (!$session->isSignedIn()) {
        header('Location: /login');
        exit;
    }

    $session->logout();
    header('Location: /login');
    exit;
   }
}
