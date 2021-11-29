<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class ClientsController extends Controller
{
    private function getIdClient ($id)
    {
        $client = DB::table('clients')->where('id', $id)->get();
        return $client;
    }
    private function getNotesClient ($client_id) 
    {
        $notes = DB::table('notes_clients')
        ->join('users', 'notes_clients.user_id', '=', 'users.id')
        ->join('clients', 'notes_clients.client_id', '=', 'clients.id')
        ->select('notes_clients.*',
        'users.name as autorName',
        'users.surname as autorSurname',
        'clients.name as clientName')->where('client_id', $client_id)->orderBy('created_at','DESC')->get();

        return $notes;
    }
    private function getIdNote ($id) {
        $note = DB::table('notes_clients')
        ->join('users', 'notes_clients.user_id', '=', 'users.id')
        ->join('clients', 'notes_clients.client_id', '=', 'clients.id')
        ->select('notes_clients.*',
        'users.name as autorName',
        'users.surname as autorSurname',
        'clients.name as clientName')->where('notes_clients.id', $id)->get();

        return $note;
    }
    public function index ()
    {
        return view('clients.index');
    }


    public function formAddClient () 
    {
        return view('clients.formAdd');
    }

    public function addNote (Request $request)
    {
        $description = $request->input('description');
        $client_id = (int)$request->input('client_id');
        $user_id = Auth::id();
        $created_at = date("Y-m-d H:i:s");

        DB::table('notes_clients')->insert([
            'client_id' => $client_id,
            'description' => $description,
            'user_id' => $user_id,
            'created_at' => $created_at
        ]);
        $request->session()->flash('success', 'Notatka została utworzona');
        return redirect('/clients/view/'.$client_id);
    }

    public function deleteNote (Request $request, $note_id)
    {
        $note = $this->getIdNote($note_id);
        if ($note[0]->user_id == Auth::user()->id || Auth::user()->admin == 1) {
            DB::table('notes_clients')->where('id',$note_id)->delete();
            $request->session()->flash('success', 'Notatka została usunięta');
            return redirect('/clients/view/'.$note[0]->client_id);
        }else {
            $request->session()->flash('error', 'Brak uprawnień');
            return redirect('/clients/view/'.$note[0]->client_id);
        }
    }

    public function formAddNote ($client_id)
    {
        $data = array();
        $data['client'] = $this->getIdClient($client_id);
        return view('clients.addNote',$data);
    }

    public function addClient (Request $request) 
    {
        $name = $request->input('name');
        $nip = $request->input('nip');
        $city = $request->input('city');
        $address = $request->input('address');
        $regon = $request->input('regon');
        $krs = $request->input('krs');
        $telephone = $request->input('telephone');
        $mail = $request->input('mail');

        if (DB::table('clients')->where('nip',$nip)->count() == 0) 
        {
            DB::table('clients')->insert([
                'name' => $name,
                'nip' => $nip,
                'city' => $city,
                'address' => $address,
                'regon' => $regon,
                'krs' => $krs,
                'telephone' => $telephone,
                'mail' => $mail
            ]);
            $request->session()->flash('success', 'Kontrahent został dodany');
            return redirect('/clients');
        }
        else 
        {
            $request->session()->flash('error', 'Kontrahent o podanym nr KRS istnieje już w bazie');
            return redirect('/clients');
        }

    }

    public function getClientsJson () 
    {
        $clients = DB::table('clients')->get();
        return json_encode($clients);
    }

    public function getClient ($id) {
        $data = array();
        $data['client'] = DB::table('clients')->where('id', $id)->get();
        $data['notes'] = $this->getNotesClient($id);

        return view('clients.viewClient', $data);
    }

    public function editClient($id) {

        $client = DB::table('clients')->where('id', $id)->get();

        return view('clients.editClient', ['client' => $client]);
    }


    public function deleteClient(Request $request, $id) {
        $request->session()->flash('error', 'Funkcja usuwania tymczasowo wyłączona');
        return redirect('/clients');
    }

    public function saveClient(Request $request) {
        $id = $request->input('id');
        $name = $request->input('name');
        $nip = $request->input('nip');
        $city = $request->input('city');
        $address = $request->input('address');
        $regon = $request->input('regon');
        $krs = $request->input('krs');
        $telephone = $request->input('telephone');
        $mail = $request->input('mail');

        $update = DB::table('clients')
              ->where('id', $id)
              ->update([
                    'name' => $name, 
                    'nip' => $nip, 
                    'city' => $city, 
                    'address' => $address, 
                    'regon' => $regon, 
                    'krs' => $krs, 
                    'telephone' => $telephone,
                    'mail' => $mail
                ]);
            
        if ($update) {
            $request->session()->flash('success', 'Kontrahent został zaktualizowany');
            return redirect('/clients');
        }else {
            $request->session()->flash('error', 'Błąd wewnętrzny lub brak zmiany danych klienta');
            return redirect('/clients');
        }


    }

    
}
