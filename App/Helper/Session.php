<?php
namespace App\Helper;

use \Core\View;
use \Core\Controller;

class Session
{
    private static $instances = [];
    private $signedIn = false;
    public $userId;
    public $message;

    private function __construct(){

        session_start();
        $this->checkLogin();
        $this->checkMessage();
    }

    public static function getInstance(): Session{

        $ins = static::class;
        if (!isset(self::$instances[$ins])) {
            self::$instances[$ins] = new static();
        }

        return self::$instances[$ins];
    }
    
    public function isSignedIn(){

        return $this->signedIn;
    }

    public function checkLogin(){

        if (isset($_SESSION['userId'])) {
            $this->userId = $_SESSION['userId'];
            $this->signedIn = true;
        } else {
            unset($this->userId);
            $this->signedIn = false;
        }
    }

    public function login($user){

        if ($user) {
            $this->userId = $user->id;
            $_SESSION['userId'] = $user->id;
            $this->signedIn = true;
        }
    }

    public function logout(){

        unset($_SESSION['userId']);
        unset($this->userId);
        $this->signedIn = false;
    }

    public function message($msg = ""){

        if (!empty($msg)) {
            $this->message = $_SESSION['message'] = $msg;
        } else {
            return $this->message;
        }
    }

    public function checkMessage(){

        if (isset($_SESSION['message'])) {
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            $this->message = "";
        }
    }
}

