<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipamentoController extends Controller
{
    public function index(){
        return view('app.equipamento');
    }
}
