<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Envio;
use Response; 

class EnviosController extends Controller
{


    public function mostrar(){
        $envios = Envio::all();

        $total = Envio::sum('cantidad'); 

        //dd($total);

        

       // dd($envio);
        return view('welcome', compact('envios', 'total')); 
    }

    public function crear (Request $request){
        //validacion

        //dd($request->input('direccion'), $request->input('cantidad')); 

        Envio::create([
            'direccion' => $request->input('direccion'),
            'cantidad' => $request->input('cantidad')
        ]);

        return redirect()->back()->with('estado', 'Direccion Creada');

    }


    public function actualizar (Request $request,  $id){

        $envio = Envio::findOrFail($id);

        $nuevaCantidad = $envio->cantidad + $request->input('cantidad'); 

        $envio->cantidad = $nuevaCantidad;

        $envio->save(); 

        return redirect()->back()->with('estado', 'actualizado');
        
    }

    public function buscador(Request $request){

        $data = trim($request->valor);
        $resultado = Envio::where('direccion', 'like', '%'.$data.'%')
        ->limit(10)
        ->get();

        return response()->json([
            "estado"=>1,
            "result" => $resultado
        ]);

    }




}
