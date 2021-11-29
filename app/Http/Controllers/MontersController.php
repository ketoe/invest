<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MontersController extends Controller
{
    public function index ()
    {
        return view('monters.index');
    }

    public function view ($id)
    {
        return view('monters.view');
    }

    public function viewAdd ()
    {
        return view('monter.add');
    }

    public function viewEdit ($id)
    {
        return viww('monter.edit');
    }

    public function add (montersRequest $request) 
    {
        $name = $request->input('name');
        $nip = $request->input('nip');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $city = $request->input('city');
        $address = $request->input('address');
        $created_at = date("Y-m-d H:i:s");

        if ($request->validated())
        {
            DB::table('monters')->insert([
                'name' => $name,
                'nip' => $nip,
                'email' => $email,
                'phone' => $phone,
                'city' => $city,
                'address' => $address,
                'created_at' => $created_at
            ]);

            $request->session()->flash('success', 'Grupa montażowa została utworzona');
            return redirect('/monters');
        }
        else
        {
            $request->session()->flash('error', 'Błąd wewnętrzny');
            return redirect('/monters');
        }
    }

    public function save (request $request)
    {

    }

    public function delete ($id)
    {

    }


}
