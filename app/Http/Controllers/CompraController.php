<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Producto;
use App\Medida;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compra::paginate();
        #$compra = Compra::first();
        #dd($compra->medida);
        return view('compras.index',compact('compras'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::all();
        $medidas = Medida::all();
        return view('compras.create',compact('productos','medidas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

   
        if (Auth::check()) {

            $this->validate($request, [
                'monto' => 'required|numeric',
                'cantidad' => 'required|numeric',
            ]);
            
                $compra = new Compra;
                $compra->producto_id = $request->input('producto_id');
                $compra->medida_id = $request->input('medida_id'); 
                $compra->monto = $request->input('monto');    
                $compra->cantidad = $request->input('cantidad');                  
                $compra->active = 1;
                $compra->save(); 
                return redirect()->back()->with('message','store');

        } else {

            return view('auth/login');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        return view('compras.show',compact('compra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        if (Auth::check()) {
            $productos = Producto::all();
            $medidas = Medida::all();
            return view('compras.edit',compact('compra','productos','medidas'));
        } else {
            return view('auth/login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        if (Auth::check()) {

            $this->validate($request, [
                'monto' => 'required|numeric',
                'cantidad' => 'required|numeric',
            ]);
            
                $compra->producto_id = $request->input('producto_id');
                $compra->medida_id = $request->input('medida_id'); 
                $compra->monto = $request->input('monto');    
                $compra->cantidad = $request->input('cantidad');                  
                $compra->active = $request->input('active'); ;
                $compra->save(); 
                return redirect('/compras')->with('message','update');

        } else {

            return view('auth/login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        $compra->delete();
        return redirect('/compras')->with('message','update');
    }
}
