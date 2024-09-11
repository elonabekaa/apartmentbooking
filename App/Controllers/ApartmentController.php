<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\Apartment;
use \Core\View;
use \Core\Controller;

class ApartmentController extends Controller
{
    public function __construct(){

        $session = Session::getInstance();
        if (!$session->isSignedIn()){
            header('Location: /login');
        }
    }

    public function index(){

        $apartments = Apartment::orderBy('id','desc')->get();
        View::renderTemplate('Apartments/index.html', ['apartments' => $apartments]);
    }

    public function create(){

        View::renderTemplate('Apartments/create.html');
    }

    public function store(){

        $apartment = new Apartment();
        $apartment->name = $_POST['name'];
        $apartment->description = $_POST['description'];
        $apartment->location = $_POST['location'];
        $apartment->price_per_night	 = $_POST['price_per_night'];
        $apartment->max_guests = $_POST['max_guests'];
        $apartment->save();

        header('Location: /apartments');
    }

    public function edit(){

        $id = $_GET['id'];
        $apartment = Apartment::findOrFail($id);

        View::renderTemplate('Apartments/edit.html', ['apartment'=>$apartment]);
    }

    public function update(){

        $id = $_POST['id'];
        $apartment = Apartment::findOrFail($id);
        $apartment->name = $_POST['name'];
        $apartment->description = $_POST['description'];
        $apartment->location = $_POST['location'];
        $apartment->price_per_night	 = $_POST['price_per_night'];
        $apartment->max_guests = $_POST['max_guests'];
        $apartment->save();

        header('Location: /apartments');
    }

    public function destroy(){
        
        $id = $_POST['id'];
        $apartment = Apartment::findOrFail($id);
        $apartment->delete();
        header('Location: /apartments');
    }
}
