<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Paciente;
use App\Models\Event;
use App\Models\Ventas;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $citasDelDia = Event::count();
        $ventasDelDia = Ventas::count();
        $ventasDelMes = Ventas::count();
        $doctores = User::count();
        $clientes = Cliente::count();
        $pacientes = Paciente::count();

        return view('home', compact('citasDelDia', 'ventasDelDia', 'ventasDelMes', 'doctores', 'clientes', 'pacientes'));
        
    }
}
