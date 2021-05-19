<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//come detto a lezione, generare nuovo controller con rotta associata; definire poi classe Movie con titolo e descrizione; definire costruttore con titolo necessario e descrizione opzionale; e metodo getString() che restituisca una stringa riportante tutte le variabili; generare poi un paio di istanze e stamparle per mezzo del dd() come visto in classe

class Movie
{
    public $title;
    public $descOpz;
    public function __construct($title, $descOpz = null)
    {
        $this->title = $title;
        if ($descOpz == null) {
            $this->descOpz = 'Descrizione Assente!';
        } else {
            $this->descOpz = $descOpz;
        }
    }
    public function getString()
    {
        return "Titolo Film: " . $this->title . ", Trama: " . $this->descOpz;
    }
}

class exerciseController extends Controller
{
    public function exercise()
    {

        $movie1 = new Movie('Titanic', 'Finisce male');
        $str1 = $movie1->getString();


        $movie2 = new Movie('Burn After Reading');
        $str2 = $movie2->getString();

        dd($movie1, $movie2, $str1, $str2);

        return view('pages.exercise');
    }
}
