<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::check()) {
            $productos = Producto::search($request->get('search'))->select('id','name','active')->orderBy('name')->paginate(10);
            return view('productos.index',compact('productos'));
        }
        else {
            return view('auth/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
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
                'name' => 'required|string|max:150',
            ]);
            
                $producto = new Producto;
                $producto->name = $request->input('name');    
                $producto->active = $request->input('active');
                $producto->save(); 
                return redirect('/productos')->with('message','store'); 

        } else {

            return view('auth/login');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        if (Auth::check()) {
            return view('productos.edit',compact('producto'));
        } else {
            return view('auth/login');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
 
        if (Auth::check()) {

            $this->validate($request, [
                'name' => 'required|string|max:150',
            ]);
            
                $producto->name = $request->input('name');
                $producto->active = $request->input('active');
                $producto->save();    
                return redirect('/productos')->with('message','update');
        } else {
            return view('auth/login');
        } 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
