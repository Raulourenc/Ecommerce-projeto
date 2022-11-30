<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\State;
use App\Models\Login;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AddressController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     
        $states = State::all();
       
        session_start();
       
        if($_SESSION['id'] != false){
            $a = $_SESSION['id'];
       

        $check = User::all()->where('admin', true);
        $checked = $check->pluck('email');
        
        foreach($checked as $mail){

            if(isset($_SESSION['email']) != false){
                $_SESSION['prod'] = true;

                return redirect("/Address/$a/edit")->with(compact('states'));
              
            }
        }

        } 

        $_SESSION['prod'] = false;
        
        return view('address', compact('states'));
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
     * @param  \App\Http\Requests\StoreAddressRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAddressRequest $request)
    {
       
        $user = new User;
        $user->name = $request->login;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->admin = $request->admin;
      
      
        $user->save();


        $client = User::all()->last();

        

        $address =  new Address;
        $address->address = $request->address;
        $address->number = $request->number;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->complement = $request->complement;
        $address->user_id = $client->id;

        $address->save();

       

        return redirect('/')->with('msg', 'Cadastro realizado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $addresses
     * @return \Illuminate\Http\Response
     */
    public function show()
    {   
        
    

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $addrses
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        session_start();
        $a = $_SESSION['id'];
        $states = State::all();
        $users = User::findOrFail($id);
        $user = $users->getAttributes();

        $address = Address::all()->where('user_id', $id);
        foreach($address as $add){
        }
        $ad = $add->getAttributes();
       
        return view('alter_address', compact('states', 'user', 'ad', 'a'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAddressRequest  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAddressRequest $request)
    {   
        

        Validator::make($request->all(), [
            'email' => [
                'required|min:3|max:40',
                Rule::unique('users')->ignore($request->id),
            ],
        ]);

        $user = User::find($request->id);
        
        $update['name'] = $request->login;
        $update['email'] = $request->email;
        $update['password'] = Hash::make($request->password);

        $save = $user->update($update);
      
    
        $add = Address::where('user_id', $user['id'])->first();

        
        $address = $request->all();

        $sav = $add->update($address);

        return redirect()->route('Address.edit', $request->id)->with('msg', 'Cadastro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $addresses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
    }
}
