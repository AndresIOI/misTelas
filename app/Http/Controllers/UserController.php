<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rol;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Order;
use App\Http\Requests\UserCreateRequest;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usuarios = User::all();
        return view('users.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(Auth::user()->rol_id == 1){
            return view('auth.registroAdmin');
        }else{
            return view('layouts.sinPermisos');
        }
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        //
        User::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'rol_id' => $request['tipo'],
            
        ]);

        return view('layouts.principal');
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
         $usuario = User::find($id);
         $roles = Rol::all();
        return view('users.edit',compact('usuario','roles'));
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
        //
        $user = User::find($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required','max:15','unique:users,username,'.$id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            'password' => [ 'confirmed'],
        ]);
        if($request['password']){
            $user->update([
                'name' => $request['name'],
                'username' => $request['username'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'rol_id' => $request['tipo'],
                
            ]);
        }else{
            $user->update([
                'name' => $request['name'],
                'username' => $request['username'],
                'email' => $request['email'],
                'rol_id' => $request['tipo'],
                
            ]);
        }    


        return view('layouts.principal');


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
    
    public function profile(){
        $ordenes = Order::where('user_id',Auth::user()->id)->get();
        return view('shop.user-profile',compact('ordenes'));
    }
}
