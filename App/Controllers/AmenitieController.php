<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\Amenitie;
use \Core\View;
use \Core\Controller;

class AmenitieController extends Controller
{
    public function __construct(){

        $session = Session::getInstance();
        if (!$session->isSignedIn()){
            header('Location: /login');
        }
    }

    public function index(){

        $amenities = Amenitie::orderBy('id', 'desc')->get();
        View::renderTemplate('Amenities/index.html', ['amenities' => $amenities]);
    }

    public function create(){

        View::renderTemplate('Amenities/create.html');
    }

    public function store(){
        
        $amenitie = new Amenitie();
        $amenitie->apartment_id	 = $_POST['apartment_id'];
        $amenitie->amenity_name = $_POST['amenity_name'];
        $amenitie->created_at = $_POST['created_at'];
        $amenitie->updated_at = $_POST['updated_at'];
        $amenitie->save();

        header('Location: /amenities');
        exit;
    }

    public function edit(){

        $id = $_GET['id'];
        $amenitie = Amenitie::findOrFail($id);
        View::renderTemplate('Amenities/edit.html', ['amenitie' => $amenitie]);
    }

    public function update(){

        $id = $_POST['id'];
        $amenitie = Amenitie::findOrFail($id);
        $amenitie->apartment_id	 = $_POST['apartment_id'];
        $amenitie->amenity_name = $_POST['amenity_name'];
        $amenitie->created_at = $_POST['created_at'];
        $amenitie->updated_at = $_POST['updated_at'];
        $amenitie->save();

        header('Location: /amenities');
        exit;
    }

    public function destroy(){
        
        $id = $_POST['id'];
        $amenitie = Amenitie::findOrFail($id);
        $amenitie->delete();

        header('Location: /amenities');
        exit;
    }
}