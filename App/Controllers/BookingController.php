<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\Booking;
use \Core\View;
use \Core\Controller;
use App\Models\Apartment;

class BookingController extends Controller
{

    public function __construct(){

        $session = Session::getInstance();
        if (!$session->isSignedIn()){
            header('Location: /login');
        }
    }

    public function index(){

        $bookings = Booking::orderBy('id','desc')->get();
        View::renderTemplate('Bookings/index.html', ['bookings' => $bookings]);
    }

    public function create(){

        $apartments = Apartment::orderBy('name')->get();
        View::renderTemplate('Bookings/create.html', ['apartments' => $apartments]);
    }

    public function store(){

        $booking = new Booking();
        $booking->user_id = $_POST['user_id'];
        $booking->apartment_id = $_POST['apartment_id'];
        $booking->check_in = $_POST['check_in'];
        $booking->check_out	 = $_POST['check_out'];
        $booking->total_price = $_POST['total_price'];
        $booking->save();

        header('Location: /bookings');
    }

    public function edit(){

        $id = $_GET['id'];
        $booking = Booking::findOrFail($id);
        $apartments = Apartment::orderBy('name')->get(); // Merr listën e apartamenteve
    
        View::renderTemplate('Bookings/edit.html', [
            'booking' => $booking,
            'apartments' => $apartments
        ]);
    }

    public function update(){

        $id = $_POST['id'];
        $booking = Booking::findOrFail($id);
        $booking->user_id = $_POST['user_id'];
        $booking->apartment_id = $_POST['apartment_id'];
        $booking->check_in = $_POST['check_in'];
        $booking->check_out	 = $_POST['check_out'];
        $booking->total_price = $_POST['total_price'];
        $booking->save();

        header('Location: /bookings');
    }

    public function destroy(){
        
        $id = $_POST['id'];
        $booking = Booking::findOrFail($id);
        $booking->delete();
        header('Location: /bookings');
    }
}
