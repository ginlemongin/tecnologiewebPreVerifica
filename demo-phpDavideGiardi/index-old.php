<?php
// se ho un file solamente contentente codice PHP il tag php NON VA CHIUSO! (funziona ugualmente)
// questo perche i framework che utilizzeremo per creare applicativi complessi
// sono molto grossi e anche solo uno spazio dopo la chiusura del tag manda in vacca tutto

// echo ":^D";
// su VSC in alto a sinistra hai la tab TERMINAL
// new terminal per aprire il terminale che ti posiziona in automatico sulla cartella corrente

// accanto alla cartella del path in cui sono in questo momento scrivo
// C:\xampp\php\php.exe -S localhost:8000 per aprire una nuova porta che mi darà il link per la pagina locale
// CTRL + C per interrompere l'esecuzione del comando e scrivere qualcos'altro sul terminale


// ---------------------------------------------------------------------------------------------------- //


// echo json_encode(['status' => true]);
// questa funzione prende come input una qualsiasi struttura dati, nel nostro caso è un array associativo
// quello che mi stampa è la struttura JSON di questo array associativo con il suo valore

// {"status":true} questo è il risultato che stamperà, è una stringa in formato JSON!


// ora copincolliamo http://localhost:8000/ sulla barra di POSTMAN e lasciamo metodo GET
// se lanciamo la richiesta così ci darà come risposta solo la stringa JSON 

// ma c'è un problema, noi abbiamo solo convertito l'array in JSON, 
// ma non gli abbiamo ancora detto che deve anche essere un file JSON! (che stupido)

// per far capire al browser che deve darci una risposta sottoforma di file JSON
// devo inserire delle info ulteriori nell'HEADER

header("Content-Type: application/json");
// con questa diciamo a tutti coloro che si collegano a index.php che il tipo di risposta che otterranno
// da una qualsiasi richiesta sarà un file di tipo JSON

echo json_encode(['status' => true]);

// {
//     "status": true
// }
// adesso sarà questa la risposta che mi restituisce con postman, identato in modo diverso e color-coded!
// vuol dire che lo sta leggendo come file JSON


// ---------------------------------------------------------------------------------------------------- //


// inseriamo altre strutture dati così a caso

$data = [
    // provo un po di varie tipologie di dati PHP in questo array associativo
    'status' => true,
    'count' => 3,
    'value' => null,
    'values' => [1, 3, 7, 9],
    'title' => "DEMO"
];

echo json_encode(
    // trasformo la mia struttura dati in json
    $data
);

/*{
    "status": true,
    "count": 3,
    "value": null,
    "values": [
        1,
        3,
        7,
        9
    ],
    "title": "DEMO"
} */

// questo è quello che ottengo con la richiesta su postman
// abbiamo trasformato una struttura dati PHP in una struttura dati JSON
// che può essere distribuita esternamente, ad altri client o altri server, tramite REST API

// tutto questo ambaradam parte dalla necessità di spostare queste strutture dati
// facendo un encoding in JSON e salvandole su un file JSON possono poi venire trasferite
// ad un altro client che mi chiede se gli passo questa struttura dati, che farà un deconding
// da JSON al formato del linguaggio originale in cui ho scritto questi dati (in questo caso PHP)
// è simile alla crittografia, ma in questo caso i dati non vengono resi segreti, ma facilmente trasportabili


// ---------------------------------------------------------------------------------------------------- //


/*
così siamo riusciti a buttare fuori una struttura dati e ci sentiamo un sacco fighi, però ora dobbiamo capire come 
agire solo su specifiche risorse (discriminando facendo una sorta di IF), inserire i vari messaggi di risposta, etc...
insomma tantissima roba, ma noi non andremo mai a scrivere tutte queste cose manualmente, utilizzeremo i FRAMEWORK
*/
