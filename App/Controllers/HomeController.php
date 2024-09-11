<?php

namespace App\Controllers;

use App\Helper\Session;
use \Core\View;
use \Core\Controller;

class HomeController extends Controller
{
    public function __construct(){

        $session = Session::getInstance();
        if (!$session->isSignedIn()){
            header('Location: /login');
        }
    }
    
    public function index(){
        
        $user = 'dashboard';
        View::renderTemplate('Dashboard/index.html',['user'=>$user]);
    }
}
