<?php
require "../vendor/autoload.php";
require "../Bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;

// Tabela për apartamentet
Capsule::schema()->create('apartments', function ($table) {
    $table->id();
    $table->string('name', 50);
    $table->text('description');
    $table->string('location');
    $table->integer('price_per_night');
    $table->integer('max_guests');
    $table->string('image_path')->nullable(); // Shto kolonën për shtegun e imazhit
    $table->timestamps();
});