<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class inicioController extends Controller
{
    // MÉTODO PARA MOSTRAR LA PÁGINA DEL CRUD
    public function inicio()
    {
        return view('inicio.inicio');
    }
}
