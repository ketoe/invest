<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{
    public function index ()
    {
        return view('admins.index');
        
    }

    //---------------------VAT---------------------------//
    public function getVat () 
    {
        $data = array();
        $data['vats'] = DB::table('vat')->get();
        return view('admins.vat',$data);
    }

    public function addVat (Request $request)
    {
        $value = $request->input('value');

        DB::table('vat')->insert([
            'value' => $value
        ]);
        $request->session()->flash('success', 'Stawka vat została dodana');
        return redirect('/admins/vat');
    }

    public function editVat ($id)
    {
        $id = is_numeric($id);
        $vat = DB::table('vat')->where('id', $id)->get();

        return view('admins.editVat', ['vat' => $vat]);
    }

    public function saveVat(Request $request) 
    {
        $id = $request->input('id');
        $value = $request->input('value');

        $update = DB::table('vat')
              ->where('id', $id)
              ->update([
                    'value' => $value, 
                ]);
            
        if ($update) {
            $request->session()->flash('success', 'Stawka vat została zaktualizowana');
            return redirect('/admins/vat');
        }else {
            $request->session()->flash('error', 'Błąd wewnętrzny lub brak zmiany danych');
            return redirect('/admins/vat');
        }

    }

    //----------------------CURRENCY-WALUTA-------------------//
    public function getCurrency () 
    {
        $data = array();
        $data['currencys'] = DB::table('currency')->get();
        return view('admins.currency',$data);
    } 

    public function addCurrency (Request $request)
    {
        $shortName = $request->input('shortName');
        $longName = $request->input('longName');
        $value = (float)$request->input('value');

        DB::table('currency')->insert([
            'shortName' => $shortName,
            'longName' => $longName,
            'value' => $value
        ]);
        $request->session()->flash('success', 'Waluta została dodana');
        return redirect('/admins/currency');
    }

    public function editCurrency ($id)
    {
        $id = is_numeric($id);
        $currency = DB::table('currency')->where('id', $id)->get();

        return view('admins.editCurrency', ['currency' => $currency]);
    }

    public function saveCurrency(Request $request) 
    {
        $id = $request->input('id');
        $shortName = $request->input('shortName');
        $longName = $request->input('longName');
        $value = $request->input('value');

        $update = DB::table('currency')
              ->where('id', $id)
              ->update([
                    'shortName' => $shortName,
                    'longName' => $longName, 
                    'value' => $value
                ]);
            
        if ($update) {
            $request->session()->flash('success', 'Waluta została zaktualizowana');
            return redirect('/admins/currency');
        }else {
            $request->session()->flash('error', 'Błąd wewnętrzny lub brak zmiany danych');
            return redirect('/admins/currency');
        }
    }

    //-------------------Orders-stages - statusy zleceń---------------------//
    public function getStatuses () 
    {
        $data = array();
        $data['statuses'] = DB::table('statuses')->get();
        return view('admins.statuses',$data);
    } 

    public function addStatus (Request $request)
    {
        $name = $request->input('name');
        $color = $request->input('color');

        DB::table('statuses')->insert([
            'name' => $name,
            'color' => $color
        ]);
        $request->session()->flash('success', 'Status został dodany');
        return redirect('/admins/statuses');
    }

    public function editStatus ($id)
    {
        $id = is_numeric($id);
        $status = DB::table('statuses')->where('id', $id)->get();

        return view('admins.editStatus', ['status' => $status]);
    }

    public function saveStatus(Request $request) 
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $color = $request->input('color');

        $update = DB::table('statuses')
              ->where('id', $id)
              ->update([
                    'name' => $name,
                    'color' => $color
                ]);
            
        if ($update) {
            $request->session()->flash('success', 'Status został zaktualizowany');
            return redirect('/admins/statuses');
        }else {
            $request->session()->flash('error', 'Błąd wewnętrzny lub brak zmiany danych');
            return redirect('/admins/statuses');
        }
    }

    //------------------PERMISSIONS-Rangi--------------------------//
    public function getPermisions() 
    {
        $data = array();
        $data['permisions'] = DB::table('permisions')->get();
        return view('admins.permisions',$data);
    }

    public function addPermision (Request $request)
    {
        $name = $request->input('name');

        DB::table('permisions')->insert([
            'name' => $name
        ]);
        $request->session()->flash('success', 'Stanowisko zostało dodane');
        return redirect('/admins/permisions');
    }

    public function editPermision ($id)
    {
        $id = is_numeric($id);
        $permision = DB::table('permisions')->where('id', $id)->get();

        return view('admins.editPermision', ['permision' => $permision]);
    }

    public function savePermision(Request $request) 
    {
        $id = $request->input('id');
        $name = $request->input('name');

        $update = DB::table('permisions')
              ->where('id', $id)
              ->update([
                    'name' => $name
                ]);
            
        if ($update) {
            $request->session()->flash('success', 'Stanowisko zostało zaktualizowane');
            return redirect('/admins/permisions');
        }else {
            $request->session()->flash('error', 'Błąd wewnętrzny lub brak zmiany danych');
            return redirect('/admins/permisions');
        }
    }

    // ------------------- USERS - Użytkownicy ------------------------//
    public function getUsers () 
    {
        $data = array();
        $data['users'] = DB::table('users')->get();
        return view('admins.users',$data);
    }

    public function addUser (Request $request) 
    {
        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));

        DB::table('users')->insert([
            'name' => $name,
            'surname' => $surname,
            'email' => $email,
            'password' => $password,
            'admin' => 0
        ]);
        $request->session()->flash('success', 'Użytkownik został dodany');
        return redirect('/admins/users');
    }

}
