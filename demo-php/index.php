<?php
// includo le librerie importate dal composer, 
// facendo la require (che è tipo la include) del nostro file autoload
require 'vendor/autoload.php';

// utilizzo la use per caricare la classe dal namespace corretto
use Ramsey\Uuid\Uuid;

// eseguo una funzionalità della libreria uuid4
// che è un metodo/funzione della classe Uuid
// i doppi :: servono per l'esecuzione di una funzione statica
// richiamiamo questo metodo sulla variabile $uuid
$uuid = Uuid::uuid4();
// non c'è bisogno di fare una new function per richiamarla perchè è statica

// ne stampo il risultato
echo $uuid;