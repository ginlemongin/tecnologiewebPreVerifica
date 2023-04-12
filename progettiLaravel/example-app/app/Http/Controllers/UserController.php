<?php
// USER CONTROLLER
// è il file che contiene le logiche, 
// ad es controlla quello che gli arriva dalle REST API 
// che ricevono i dati da un qualsiasi client e li valida
// per vedere se possono essere inseriti nel mio database

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// inserisco questa use nuova per importare il validator che userò dopo
use Illuminate\Support\Facades\Validator;
use App\Models\User;


class UserController0 extends Controller
{
    // prima vado nelle rotte (routes/api.php) e cambio il metodo da GET a POST
    public function create(Request $request)
    {
        // creo un utente con username che sarà un VARCHAR di 255, etc:
        // username VARCHAR(255)
        // email VARCHAR(255)
        // name VARCHAR(255)
        // surname VARCHAR(255)
        // age INTEGER
        // title VARCHAR (255) DEFAULT NULL 
        // (mr, mrs, ms, etc, default null significa che non è un campo obbligatorio)

        $validator = Validator::make(
            $request->all(),
            // array delle regole
            // https://laravel.com/docs/8.x/validation#available-validation-rules
            // qui trovo le regole di validazione!
            [
                'username' => 'required|max:255',
                // questo è un modo per impostare una regola di validazione
                'email' => ['required', 'max:255', 'email'],
                // con l'array è un altro modo per impostare regole 
                // (email è una regola di validazione che controlla che il formato sia quello giusto con la chiocciola)
                'name' => ['required', 'max:255'],
                'surname' => ['required', 'max:255'],
                // age è un intero e non è nullable, non deve superare i 130 anni e minimo 18 anni
                'age' => ['required', 'integer', 'max:130', 'min:18'],
                // title gli dico solo che deve essere 255 caratteri max, non metto required
                'title' => 'max:255',

            ]
        );

        // così facendo ho predisposto la validazione, che verrà eseguita qui
        if ($validator->fails()) {
            // se il validator trova qualcosa che non va negli input inseriti nel form
            // mi ritorna una risposta in JSON con status code 400 (bad request)
            return response()->json([
                // qui dentro vado a fornire ulteriori informazioni per capire
                // dove è avvenuto l'errore, per farlo utilizzo il metodo errors
                'errors' => $validator->errors()
                // gli dico restituiscimi una risposta in un array associativo chiamato errors
                // che contiene tutti gli errori riscontrati durante la validazione
                // qui troverò tutto cio che ha fatto fallire la validazione
            ], 400);
        }
    }
};

// eseguo il comando sulla console 'php artisan serve'
// poi su postman vado a mandargli con metodo POST http://localhost:8000/api/users
// e nel body della request metto questo file JSON


/*!{
    "username": "lmao420",
    "name": "chikkn",
    "surname": "biskit",
    "email": "lmfao@mail.com",
    "age": 40
}!*/
 

// andrà a buon fine perche supera la validazione e inserisce con POST il nuovo utente
// se i dati inseriti nel body non superano la validazione mi restituisce un JSON
// con il messaggio di errore di ciò che ho sbagliato (es non hai messo un campo required)

// visto che figata? con una decina di righe di codice siamo riusciti a realizzare un metodo
// per validare dei campi di un FORM che a farlo in PHP puro senza utilizzare il framework laravel
// avrei consumato righe e righe di codice :o
// si usano i framework perche velocizzano un sacco il lavoro!

// ora che abbiamo fatto la validazione dobbiamo salvare i dati inseriti sul database,
// per farlo dobbiamo conoscere il concetto di validazione di LARAVEL



// PUBLIC FUNCTIONS
// definisco ora tutte le public functions per eseguire i metodi get, put, delete, read, etc
// sulle mie risorse (in questo caso sulla tabella users)

class UserController extends Controller
{
    public function create(Request $request)
    {

        //https://laravel.com/docs/10.x/validation
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'max:255'],
            'name' => ['required', 'max:255'],
            'surname' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email'],
            'age' => ['required', 'integer'],
            'title' => ['max:255']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        //Qui dovrò agire su DB facendo un INSERT


        // INSERIMENTO
        // voglio fare la funzione per inserire un nuovo utente su DB
        // creando un nuovo oggetto della classe User
        $user = new User();
        $user->username = $request->input('username');
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->age = $request->input('age');
        $user->title = $request->input('title');
        $user->save();

        // se vado su postman e faccio POST http://localhost:8000/api/users
        // aggiungero questo utente di prova nel DB!
        // nel body di postman inserisco i dati utente da aggiungere al DB
        // {
        //     "username": "lolmao",
        //     "name": "lol",
        //     "surname": "lmao",
        //     "email": "lol@lmao.it",
        //     "age": 20
        // }

        // attenzione: grazie al validator potrò inserire nel body della request
        // solo un utente che rispetti tutti i campi della tabella, altrimenti 
        // risponderà con un errore

        // una cosa buona e giusta è restituire in una risposta di una create
        // un oggetto in JSON, così per vedere qual'è l'ID siccome è un campo
        // autoincrementale che non inserisco io
        return response()->json($user, 201);
        // 201 è lo status della risposta (created)
    }

    public function delete(Request $request, $id)
    {
        //DELETE http://localhost:8000/api/users/7
        //$id = 7

        //Operazione di DELETE su DB

        // ELIMINAZIONE
        /*È possibile eliminare un singolo record (se selezionato come visto in precedenza)
        o eliminare i record risultanti da una query di selezione */
        // anche qui basta utilizzare l'ID

        // prima trovo l'user tramite id e lo memorizzo in $user
        $user = User::findOrFail($id);
        // poi cancello il contenuto che avevo memorizzato in $user
        $user->delete();
        // ritorno un json null vuoto con codice 204
        return response()->json(null, 204);
    }

    public function read(Request $request, $id)
    {
        //GET http://localhost:8000/api/users/3
        //$id=3

        //Operazione di SELECT su DB
        // creo una variabile dentro la quale ci inserisco 
        // i dati della riga specifica che voglio leggere
        // id sarà quello che inserisco nell'URI 
        $user = User::findOrFail($id);
        // find or fail prendere quel risultato e se non c'è fallisce e da 404
        // la variabile id prenderà il valore di quello che
        // scrivo nell'uri che copierò su postman (3 in questo esempio)
        // un altro modo per scrivere la stessa cosa è questo
        $user = User::where('id', '=', $id)->with('reviews')->firstOrFail();
        // sono la stessa cosa, ma la prima è piu breve

        // la risposta che riceverò su postman
        return response()->json($user);
    }

    // qui andrò ad aprire il metodo readall per fare la mia SELEZIONE
    public function readAll(Request $request)
    {
        //Operazione di SELECT su DB
        // SELECT * FROM users
        $users = User::with('reviews')->get();
        // la lettura del DB avverrà con questa funzione!
        // per ogni utente otterrò tra le sue caratteristiche un array
        // 'reviews' contenente tutte le recensioni, fa sostanzialmente una join
        // ma inserisce poi i dati della tabella reviews dentro l'oggetto user!
        // presenta una struttura dati in json molto ben ordinata
        return response()->json($users, 200);
        // mi ritorna la response in formato json della tabella users
        // 200 è lo status della risposta

    }

    // per effettuare la ricerca devo andare su postman fare metodo GET
    // e copiare http://localhost:8000/api/users
    // che mi restituirà un json che è un array con dentro tanti oggetti
    // quanti sono gli utenti nella mia tabella!

    public function update(Request $request, $id)
    {
        //PUT http://localhost:8000/api/users/22
        //$id=22     

        //https://laravel.com/docs/10.x/validation
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'max:255'],
            'name' => ['required', 'max:255'],
            'surname' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email'],
            'age' => ['required', 'integer'],
            'title' => ['max:255']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        //Ora eseguo la UPDATE su database
        // uguale alla create ma user va trovato prima con find or fail
        $user = User::findOrFail($id);
        $user->username = $request->input('username');
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->age = $request->input('age');
        $user->title = $request->input('title');
        $user->save();

        return response()->json($user, 200);

    }
}

