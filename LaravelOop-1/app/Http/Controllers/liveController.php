<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//  USER
// - definire classe User caratterizzata da nomeUtente, password
// - definire una funzione all'interno della classe User per ottenere una stringa
//   che rappresenti l'utente
// - all'interno del metodo del controller (home) istanziare un paio di oggetti
//   di tipo User (new User())
// - definire i relativi dati (username e password)
// - stampare risultati della getString() attraverso il dd
//____________________________________________________________
//
//  USERCONSTRUCT
// - aggiungere il metodo __construct che acquisisca le 2 informazioni username e 
//   password in maniera obbligatoria
//____________________________________________________________
//
//  USERCONSTRUCTOPZ
// - definire il secondo parametro del costruttore (password) come opzionale e 
//   nel caso non sia fornito valorizzare l'attributo corrispondente per mezzo
//   della funzione nativa del php uniqid()
//____________________________________________________________
//
//  USERLAST
// - generare altre due istanze della classe User, e aggiungere poi tutti gli oggetti
//   creati all'interno di un array
// - ciclando sull'array stampare tutti gli elementi


class User
{
    public $username;
    public $password;
    public function getString()
    {
        return "User: " . $this->username . " --> " . $this->password;
    }
}

class UserCostruct
{
    public function __construct($usernameCos, $passwordCos) {
        $this -> username = $usernameCos;
        $this -> password = $passwordCos;
    }
    public function getString()
    {
        return "UserConstruct: " . $this->username . " --> " . $this->password;
    }
}

class UserCostructOpz
{
    public function __construct($usernameCosOpz, $passwordCosOpz = null)
    {
        $this->username = $usernameCosOpz;
        if ($passwordCosOpz = null) {

            $this->password = uniqid();
    } else {
        $this-> password = $passwordCosOpz;
    }
}

    public function getString()
    {
        return "UserConstruct: " . $this->username . " --> " . $this->password;
    }
}

class UserLast
{
    public $usernameLast;
    public $passwordLast;
    public function __construct($usernameLast, $passwordLast = null)
    {
        $this->usernameLast = $usernameLast;
        if ($passwordLast == null) {
            $this->passwordLast = uniqid();
        } else {
            $this->passwordLast = $passwordLast;
        }
    }
    public function getString()
    {
        return "UserLast: " . $this->usernameLast . " --> " . $this->passwordLast;
    }
}

class liveController extends Controller
{
    public function home() {

        //es User
        $user1 = new User();
        $user1->username = 'Guybrush';
        $user1->password = 'miaPass';

        $user2 = new User();
        $user2->username = 'Franco';
        $user2->password = 'tuaPass';

        $str1 = $user1->getString();
        $str2 = $user2->getString();
        
        //es UserConstruct
        $user1cos = new UserCostruct('zuingo', '88');
        $strUser1cos = $user1cos->getString();

        //es UserLast
        $user1last = new UserLast('Guybrush', 'miaPass');       
        $user2last = new UserLast('Franco');       
        $user3last = new UserLast('Chiara');
        $user4last = new UserLast('Francesco', 'tuaPass');

        $usersLast = [
            $user1last,
            $user2last,
            $user3last,
            $user4last
        ];

        $strLast = '';

        foreach ($usersLast as $userLast) {
            $strLast .= $userLast->getString() . "\n";
        }


        dd($str1, $str2, $user1, $user2, 
        $user1cos, $strUser1cos, $strLast);

        return view('pages.home');
    }
}