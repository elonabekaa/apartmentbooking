<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\Review;
use \Core\View;
use \Core\Controller;
use App\Models\Apartment;

class ReviewController extends Controller
{
    public function __construct(){

        $session = Session::getInstance();
        if (!$session->isSignedIn()){
            header('Location: /login');
        }
    }

    public function index(){

        $reviews = Review::orderBy('id','desc')->get();
        View::renderTemplate('Reviews/index.html', ['reviews' => $reviews]);
    }

    public function create(){

        $apartments = Apartment::orderBy('name')->get();
        View::renderTemplate('Reviews/create.html', ['apartments' => $apartments]);
    }

    public function store(){

        $review = new Review();
        $review->user_id = $_POST['user_id'];
        $review->apartment_id = $_POST['apartment_id'];
        $review->review_text = $_POST['review_text'];
        $review->rating = $_POST['rating'];
        $review->save();
    
        header('Location: /reviews');
        exit; 
    }

    public function edit(){

        $id = $_GET['id'];
        $review = Review::findOrFail($id);
        $apartments = Apartment::orderBy('name')->get(); // Merr listën e apartamenteve
    
        View::renderTemplate('Reviews/edit.html', [
            'review' => $review,
            'apartments' => $apartments
        ]);  
    }
    
    public function update(){
        
        $id = $_POST['id'];
        $review = Review::findOrFail($id);
        $review->user_id = $_POST['user_id'];
        $review->apartment_id = $_POST['apartment_id'];
        $review->review_text = $_POST['review_text'];
        $review->rating = $_POST['rating'];
        $review->update();

        header('Location: /reviews');
    }

    public function destroy(){

        $id = $_POST['id'];
        $review = Review::findOrFail($id);
        $review->delete();

        header('Location: /reviews');
    }  
}
