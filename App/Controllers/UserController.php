<?php

namespace App\Controllers;

use \App\Helper\Session;
use App\Models\User;
use \Core\View;
use \Core\Controller;

class UserController extends Controller
{
    public function __construct(){

        $session = Session::getInstance();
        if (!$session->isSignedIn()){
            header('Location: /login');
        }
    }

    public function index(){

        $users = User::orderBy('id', 'desc')->get();
        View::renderTemplate('Users/index.html', ['users' => $users]);
    }

    public function create(){

        View::renderTemplate('Users/create.html');
    
    }

    public function store(){

        $user = new User();
        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];
        $user->country = $_POST['country'];
        $user->city = $_POST['city'];
        $user->address = $_POST['address'];
        $user->phone = $_POST['phone'];  
        $user->status = $_POST['status']; 
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        $user->save();

        header('Location: /users');
        exit;
    }

    public function edit(){

        $id = $_GET['id'];
        $user = User::findOrFail($id);
        View::renderTemplate('Users/edit.html', ['user' => $user]);
    }

    public function update(){

        $id = $_POST['id'];
        $user = User::findOrFail($id);
        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];
        $user->country = $_POST['country'];
        $user->city = $_POST['city'];
        $user->address = $_POST['address'];
        $user->phone = $_POST['phone']; 
        $user->status = $_POST['status'];
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        $user->save();

        header('Location: /users');
        exit;
    }

    public function destroy(){
        
        $id = $_POST['id'];
        $user = User::findOrFail($id);
        $user->delete();

        header('Location: /users');
        exit;
    }
}