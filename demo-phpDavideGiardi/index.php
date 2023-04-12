<?php
//includo le librerie importate dal composer
require('vendor/autoload.php');
//utilizzo la use per caricare la classe dal namespace corretto
use Ramsey\Uuid\Uuid;
//eseguo una funzionalità della libreria
$uuid = Uuid::uuid4();
//ne stampo il risultato
echo $uuid;