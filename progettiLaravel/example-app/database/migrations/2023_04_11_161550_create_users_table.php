<?php
// MIGRATIONS
/* Ho creato questo file di migrazione per costruire una tabella
scrivendo sulla console cmd: 
php artisan make:migration create_users_table --create=users 

questo posso farlo perche ho definito la funzione per creare una migrazione
nel file usercontroller.php??? */



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
    // la funzione UP crea la tabella del database
    {
        // crea un nuovo schema (è una classe di laravel) che è una tabella del database
        // il primo parametro è il nome della tabella (users)
        // la costruzione delle colonne viene demandata alla funzione in input
        // che contiene istruzioni per identificare le varie colonne che voglio inserire
        // (es nella tabella users le colonne saranno nome cognome username età)
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // questo significa che voglio creare una colonna chiamata ID che sarà 
            // di integer autoincrementale
            // non devo specificare nulla perche il metodo ID è gia specificato 
            // nelle opzioni di laravel per avere autoincremento e accetta numeri interi
            $table->timestamps();
            // questa invece è una funzione che mi crea due campi che accettani dati di tipo
            // datetime (per salvare data e ora sul db), 
            // uno si aggiorna quando la riga viene creata e l'altro quando viene aggiornata 

            // se voglio inserire una tabella che accetta stringhe per il campo username
            // su laravel mi basta fare
            $table->string('username');
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->integer('age');
            // siccome titolo è opzionale devo dire al database di creare un campo nullable
            // aka il campo può essere null
            $table->string('title')->nullable();
            // in questo modo mi sono segnato la struttura della mia tabella
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    // la funzione DOWN fa il contrario della up quindi elimina la tabella
    // questo perche nelle migrazioni ci si può muovere in avanti e indietro
    // come tra le versioni del versioning
    {
        Schema::dropIfExists('users');
    }
};

// per eseguire la migrazione, dunque aggiornare effettivamente il mio database
// apro il terminale e scrivo: 
// php artisan migrate

// se vado su phpmyadmin vedo che è apparsa la tabella users che gli ho detto di creare
// che ha la stessa struttura che gli ho detto di creare!

// la migrate prende tutte le migrazioni che abbiamo segnato e ne esegue la UP
// il rollback invece fa la down alla versione precedente
// php artisan migrate:rollback
// quindi mi cancello tutta la tabella appena creata :D

// mi raccomando, la migrate serve per salvare la struttura delle tabelle dei db
// non salva anche i dati contenuti nelle tabelle! quello lo fai coi backup


// ELOQUENT
/* E' l'ORM (quella tecnica che trasforma dati di una tabella db in oggetti) 
integrato di default in Laravel, per permetterci di accedere in lettura e scrittura
ai dati delle tabelle dei DB, memorizzando anche le relazioni tra i dati delle varie tab. 

Quando vado a leggere da una tabella che ha ad es 10 righe, avrò come ORM un vettore 
di 10 oggetti di classe 'user' le cui proprietà saranno le colonne della tabella user
e come metodi le relazioni che li legano ad altre tabelle!

MODEL
Nel MVC il MODEL è quella parte che si interfaccia coi dati. Devo quindi trovare
all'interno di laravel la parte dove mettere questa funzionalità per interfacciarsi
col database. Questo passaggio è necessario per poter trasformare le tabelle in oggetti!
L'oggetto di classe 'user' viene creato perche l'ho definito tramite il model!
per fare un model scrivo nel terminale:
!php artisan make:model user

● Un modello Laravel appena creato, collegato ad una semplice tabella, è già
direttamente utilizzabile all’interno di un controller.
● Altrimenti, è possibile definirlo meglio con relazioni e particolari funzionalità
chiamate Accessors e Mutators.
● La convenzione prevede l'uso di "snake_case" pluralizzato per i nomi delle
tabelle (users tutto minuscolo plurale) e singolare "StudlyCase" per i nomi dei modelli. 
Per esempio:
○ Una tabella di cats avrebbe un modello Cat
○ Una tabella jungle_cats avrebbe un modello JungleCat
○ Una tabella users avrebbe un modello User
○ Una tabella people avrebbe un modello Person (intelligente!)

Tramite questa convenzione laravel sa che quando ho un oggetto di classe User
mi sto riferendo a una tabella del db chiamata users 
Quello che effettivamente mi identifica il collegamento tra il mio codice e il db
non è la migration, ma proprio il model! 

I modelli li trovo e li creo dentro la cartella MODELS (che vado a creare da zero)
php artisan make:model User*/