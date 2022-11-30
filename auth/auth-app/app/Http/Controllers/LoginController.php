<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Products;
use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\UpdateLoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        session_start(); 
        $_SESSION['rota'] = Route('index');
        $_SESSION['email'] = false;
        $_SESSION['id'] = false;
        
        $search = $request->input('search_');
        if($search != ""){
            $products = Products::where('name', 'LIKE', "%$search%")->paginate(8);
        } else {
            $products = Products::paginate(8);
        }
        
        return view('login', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * method login
     */
    public function create(StoreLoginRequest $request)
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLoginRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLoginRequest $request)

    {  
        $user = $request->all('email', 'password');

        session_start();
        $_SESSION['email'] = $request->email;
        $_SESSION['password'] = $request->password;
       
       
        $search = $request->input('search_');
        if($search != ""){
            $products = Products::where('name', 'LIKE', "%$search%")->paginate(8);
        } else {
            $products = Products::paginate(8);
        }
   
        if (Auth::attempt($user)) {
        
            $request->session()->regenerate();

            return redirect()->intended(route('welcome'))->with(compact('products', 'user'));
        }

        return back()->withErrors([
            'email' => 'Email não cadastrado.',
        ])->onlyInput('email')->with(compact('products'));
      
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function show(Login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function edit(Login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLoginRequest  $request
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLoginRequest $request, Login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy(Login $login)
    {
        //
    }
}
