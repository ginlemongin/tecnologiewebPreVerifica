<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->integer('stars');
            // aggiungo un campo che deve avere lo stesso id dello user
            // per capire a quale utente appartiene ciascuna recensione
            
            $table->unsignedBigInteger('user_id');
            // questa chiave deve avere la stessa tipologia di ID della tabella utente
            $table->foreign('user_id')->references('id')->on('users');
            // voglio dare un vincolo strutturale diretatamente alla mia tabella db
            // per far si che la tab reviews richieda una chiave esterna della tab users
            // così che posso crare recensioni solo se ho un user che esiste!

            $table->unsignedBigInteger('hotel_id');
            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->timestamps();
        });
    }

    // ora svuoto il database corrente e rieseguo da zero la migrazione: 
    // php artisan migrate:fresh

    // utilizzando una chiave esterna (user id della tabella users) si crea un vincolo
    // che non permette di aggiungere recensioni nuove se l'id utente non corrisponde
    // ad alcun utente sull'altra tabella users!

    // devo entrare nei models ed esplicitare le relazioni tra i due modelli user e review
    // se questi sono collegati nei models lo diventeranno anche nel database per magia lol




    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};


// php artisan migrate:fresh
// crea la tabella reviews sul mio db cancellando quella che c'era prima!