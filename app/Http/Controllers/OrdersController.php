<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index () 
    {
        return view ('orders.index');
    }

    public function formAddOrder ($client_id = null)
    {
        $data = array();
        $data['statuses'] =  DB::table('statuses')->get();
        $data['vats'] = DB::table('vat')->get();
        $data['currencys'] = DB::table('currency')->get();
        $data['number'] = $this->generateNumber(date("Y"));
        $data['client_id'] = $client_id;
        if ($client_id != null) 
        {
            $client = DB::table('clients')->where('id', $client_id)->get();
            $data['client_name'] = $client[0]->name;
        }
        return view ('orders.addOrder',$data);
    }

   

    public function addOrder (Request $request)
    {
        $number = $request->input('number');
        $client_id = $request->input('client_id');
        $value = $request->input('value');
        $placeMonter = $request->input('placeMonter');
        $currency_id = $request->input('currency_id');
        $vat_id = $request->input('vat_id');
        $status_id = $request->input('status_id');
        $description = $request->input('description');
        if (!empty($request->input('monter'))) {
            $monter = $request->input('monter');
        }else {
            $monter = 0;
        }
        $user_id = Auth::id();
        $created_at = date("Y-m-d H:i:s");

        DB::table('orders')->insert([
           'number' => $number,
           'value' => $value,
           'placeMonter' => $placeMonter,
           'currency_id' => $currency_id,
           'vat_id' => $vat_id,
           'status_id' => $status_id,
           'description' => $description,
           'monter' => $monter,
           'year' => date("Y"),
           'user_id' => $user_id,
           'client_id' => $client_id,
           'created_at' => $created_at
        ]);
        $request->session()->flash('success', 'Zlecenie zostało utworzone');
        return redirect('/orders');
    }

    public function getOrdersJson ()
    {
        return json_encode($this->getOrdersStandardDate());
    }

    public function generateNumber ($year)
    {
        $count_orders = DB::table('orders')->where('year', $year)->get()->count();
        return ($count_orders+1).'/'.$year;
    }

    private function getOrdersStandardDate () //podstawowe dane
    {
        $orders = DB::table('orders')
        ->join('currency', 'orders.currency_id', '=', 'currency.id')
        ->join('vat', 'orders.vat_id', '=', 'vat.id')
        ->join('clients', 'orders.client_id', '=', 'clients.id')
        ->join('statuses', 'orders.status_id', '=', 'statuses.id')
        ->select('orders.*',
        'vat.value as vat',
        'currency.shortName as currency',
        'clients.name as clientName',
        'clients.id as clientId',
        'statuses.name as statusName',
        'statuses.color as statusColor')
        ->get();

        return $orders;
    }




}
