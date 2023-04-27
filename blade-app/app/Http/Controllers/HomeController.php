<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**la funzione ritorna un array associativo il motore di
     * rendering prende l'array e crea delle variabili chiamandole ocn il
     * nome dell' indice quindi  'pippo' => $time la variabile si chiamerà
     * $pippo con il valore di $time
     *
     */
    public function home()
    {
        return view('home', [
            'time' => date('H:i:s'),
            'date' => date('d/m/Y'),
            'content' => '<b>Qui grassetto</b> <i>Qui corsivo</i>',
            'number' => 8,
            'rows' => [
                1,2,3,4,5,6,7,8,9,10
            ]
        ]);
    }
}
