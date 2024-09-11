<?php
$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'AuthController', 'action' => 'homePage']);
$router->add('dashboard', ['controller' => 'HomeController', 'action' => 'index']);

$router->add('users', ['controller' => 'UserController', 'action' => 'index']);
$router->add('users/create', ['controller' => 'UserController', 'action' => 'create']);
$router->add('users/store', ['controller' => 'UserController', 'action' => 'store']);
$router->add('users/edit', ['controller' => 'UserController', 'action' => 'edit']);
$router->add('users/update', ['controller' => 'UserController', 'action' => 'update']);
$router->add('users/delete', ['controller' => 'UserController', 'action' => 'destroy']);

$router->add('reviews', ['controller' => 'ReviewController', 'action' => 'index']);
$router->add('reviews/create', ['controller' => 'ReviewController', 'action' => 'create']);
$router->add('reviews/store', ['controller' => 'ReviewController', 'action' => 'store']);
$router->add('reviews/edit', ['controller' => 'ReviewController', 'action' => 'edit']);
$router->add('reviews/update', ['controller' => 'ReviewController', 'action' => 'update']);
$router->add('reviews/delete', ['controller' => 'ReviewController', 'action' => 'destroy']);

$router->add('payments', ['controller' => 'PaymentController', 'action' => 'index']);
$router->add('payments/create', ['controller' => 'PaymentController', 'action' => 'create']);
$router->add('payments/store', ['controller' => 'PaymentController', 'action' => 'store']);
$router->add('payments/edit', ['controller' => 'PaymentController', 'action' => 'edit']);
$router->add('payments/update', ['controller' => 'PaymentController', 'action' => 'update']);
$router->add('payments/delete', ['controller' => 'PaymentController', 'action' => 'destroy']);

$router->add('amenities', ['controller' => 'AmenitieController', 'action' => 'index']);
$router->add('amenities/create', ['controller' => 'AmenitieController', 'action' => 'create']);
$router->add('amenities/store', ['controller' => 'AmenitieController', 'action' => 'store']);
$router->add('amenities/edit', ['controller' => 'AmenitieController', 'action' => 'edit']);
$router->add('amenities/update', ['controller' => 'AmenitieController', 'action' => 'update']);
$router->add('amenities/delete', ['controller' => 'AmenitieController', 'action' => 'destroy']);

$router->add('apartments', ['controller' => 'ApartmentController', 'action' => 'index']);
$router->add('apartments/create', ['controller' => 'ApartmentController', 'action' => 'create']);
$router->add('apartments/store', ['controller' => 'ApartmentController', 'action' => 'store']);
$router->add('apartments/edit', ['controller' => 'ApartmentController', 'action' => 'edit']);
$router->add('apartments/update', ['controller' => 'ApartmentController', 'action' => 'update']);
$router->add('apartments/delete', ['controller' => 'ApartmentController', 'action' => 'destroy']);

$router->add('bookings', ['controller' => 'BookingController', 'action' => 'index']);
$router->add('bookings/create', ['controller' => 'BookingController', 'action' => 'create']);
$router->add('bookings/store', ['controller' => 'BookingController', 'action' => 'store']);
$router->add('bookings/edit', ['controller' => 'BookingController', 'action' => 'edit']);
$router->add('bookings/update', ['controller' => 'BookingController', 'action' => 'update']);
$router->add('bookings/delete', ['controller' => 'BookingController', 'action' => 'destroy']);

$router->add('login', ['controller' => 'AuthController', 'action' => 'login']);
$router->add('login-store', ['controller' => 'AuthController', 'action' => 'store']);
$router->add('logout', ['controller' => 'AuthController', 'action' => 'logout']);


$router->dispatch($_SERVER['QUERY_STRING']);


?>