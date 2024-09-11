<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\Payment;
use \Core\View;
use \Core\Controller;

class PaymentController extends Controller
{
    public function __construct(){

        $session = Session::getInstance();
        if (!$session->isSignedIn()){
            header('Location: /login');
        }
    }

    public function index(){

        $payments = Payment::orderBy('id','desc')->get();
        View::renderTemplate('Payments/index.html', ['payments' => $payments]);
    }

    public function create(){

        View::renderTemplate('Payments/create.html');
    }

    public function store(){

        Payment::create($_POST);

        header('Location: /payments');
    }

    public function edit(){
        $id = $_GET['id'];
        $payment = Payment::findOrFail($id);

        View::renderTemplate('Payments/edit.html', ['payment' => $payment]); 
    }
    
    public function update(){

        $id = $_POST['id'];
        $payment = Payment::findOrFail($id);
        $payment->booking_id = $_POST['booking_id'];
        $payment->amount = $_POST['amount'];
        $payment->payment_method = $_POST['payment_method'];
        $payment->payment_date = $_POST['payment_date'];
        $payment->update();

        header('Location: /payments');
    }

    public function destroy(){

        $id = $_POST['id'];
        $review = Payment::findOrFail($id);
        $review->delete();

        header('Location: /payments');
    }
}
