<?php

namespace App\Http\Controllers;

use App\Models\THorno;
use App\Models\TTemperatura;
use Exception;
use Illuminate\Http\Request;

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
        $horno = THorno::all();
        return view('home',['hornoData' => $horno]);
    }

    public function getTemperatura(){
        try {
            $temperatura = TTemperatura::latest()->first();
            return response()->json(['temperatura1' => $temperatura->Temp_Prim, 'temperatura2' => $temperatura->Temp_Sec]);
        } catch (Exception $e) {
            return response()->json(['error' => $e], 500);
        }
    }
    
}
