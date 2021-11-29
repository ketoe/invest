@section('title')
    <li class="breadcrumb-item"><a href="/clients">Baza kontrahentów</a></li>
    <li class="breadcrumb-item">{{ $client[0]->name }}</li>
@endsection

@section('content')

<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="data-tab" data-toggle="tab" href="#data" role="tab" aria-controls="data" aria-selected="true">Dane podstawowe</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="notes-tab" data-toggle="tab" href="#notes" role="tab" aria-controls="notes" aria-selected="false">Notatki</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false">Zlecenia</a>
            </li>
        </ul>
    </div>
</div>


<div class="tab-content" id="myTabContent">

    <div class="tab-pane fade show active" id="data" role="tabpanel" aria-labelledby="data-tab">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Dane Podstawowe</div>
                    <div class="card-block">
                        <div class="card-text">
                            <table CELLPADDING=5>
                                <tr>
                                    <td><b>Nazwa:</b></td><td>{{$client[0]->name}}</td>
                                </tr><tr>
                                    <td><b>NIP:</b></td><td>{{$client[0]->nip}}</td>
                                </tr><tr>
                                    <td><b>KRS:</b></td><td>{{$client[0]->krs}}</td>
                                </tr><tr>
                                    <td><b>Regon:</b></td><td>{{$client[0]->regon}}</td>
                                </tr><tr>
                                    <td><b>Miasto:</b></td><td>{{$client[0]->city}}</td>
                                </tr><tr>
                                    <td><b>Adres:</b></td><td>{{$client[0]->address}}</td>
                                </tr><tr>
                                    <td><b>Kontakt:</b></td><td>{{$client[0]->telephone}}</td>
                                </tr><tr>
                                    <td><b>Mail:</b></td><td>{{$client[0]->mail}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Dane Analityczne</div>
                    <div class="card-block">
                        <div class="card-text">
                            <table CELLPADDING=5>
                                <tr>
                                    <td><b>Ilość zleceń:</b></td><td></td>
                                </tr><tr>
                                    <td><b>Wartość zleceń:</b></td><td></td>
                                </tr><tr>
                                    <td><b>Średnia kwota zleceń:</b></td><td></td>
                                </tr><tr>
                                    <td><b>Najniższa kwota zlecenia:</b></td><td></td>
                                </tr><tr>
                                    <td><b>Najwyższa kwota zlecenia:</b></td><td></td>
                                </tr><tr>
                                    <td><b>Data ostatniego zlecenia:</b></td><td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Edycja</div>
                    <div class="card-block">
                        <div class="card-text">
                            <a href="#" class="btn btn-block btn-sm btn-primary btn-all">Edytuj</a><br>
                            <a href="/orders/formAddOrder/{{$client[0]->id}}" class="btn btn-block btn-sm btn-success btn-all">Utwórz zlecenie</a><br>
                            <a href="#" class="btn btn-block btn-danger btn-sm btn-all">Usuń</a><br>
                            <a href="/clients/addNote/{{$client[0]->id}}" class="btn btn-block btn-sm btn-warning btn-all">Dodaj notatkę</a><Br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="notes" role="tabpanel" aria-labelledby="notes-tab">
        <div class="row">
            <div class="col-md-12">
                @foreach ($notes as $note)
                    <div class="card">
                        <div class="card-header card-header-note">
                            {{ $note->autorName }} {{ $note->autorSurname }}
                            @if (Auth::id() == $note->user_id || Auth::user()->admin == 1)
                                {{-- <a href="/clients/editNote/{{$note->id}}"><div class="btn-edit" style="float: right;"></div></a> --}}
                                <a href="/clients/deleteNote/{{$note->id}}"><div class="btn-delete" style="float: right;"></div></a>
                            @endif
                            <div class="card-header-date"> {{ $note->created_at }}</div>
                        </div>
                        <Div class="card-block">
                            <div class="card-text card-text-note">
                                {{ $note->description }}
                            </div>
                        </Div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Lista zleceń</div>
                    <div class="card-block">
                        <div class="card-text">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    
@endsection

@include('general.index')