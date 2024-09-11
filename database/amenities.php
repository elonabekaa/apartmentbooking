<?php
require "../vendor/autoload.php";
require "../Bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;

// Tabela për lehtësitë e apartamenteve
Capsule::schema()->create('amenities', function ($table) {
    $table->id();
    $table->unsignedBigInteger('apartment_id'); // Pa lidhje direkte
    $table->string('amenity_name');
    $table->timestamps();
});
