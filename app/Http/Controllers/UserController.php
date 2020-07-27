<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (Auth::check()) {
            $users = User::search($request->get('search'))->select('id','name', 'email','active')->orderBy('name')->paginate(10);
            return view('users.index',compact('users'));
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
                //
        if (Auth::check()) {
            $user = User::find($id);
            
            return view('users.edit',compact('user'));
        }
        else {
            return view('auth/login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::check()) {
            // validate

            $validator = validator::make($request->all(), [
                'name' => 'required|string|max:150',
                'email' => 'required|string|email|max:150|unique:users,email,'.$id,
                'password' => 'required|string|min:6',
                'cpassword' => 'required|string|min:6|same:password',],

                [ 
                'password.required' => 'Enter password', 
                'cpassword.required' => 'Password no es igual',     
                
            ]);

            if ($validator->fails()) {
                return redirect('users/'.$id.'/edit')
                            ->withErrors($validator)
                            ->withInput();
            }
            else {
                $user = User::find($id);
                
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->active = $request->input('active');
                $user->password = bcrypt($request->input('password'));
                $user->save();          
                
                return redirect('/users')->with('message','update');
            }
        }
        else {
            return view('auth/login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
