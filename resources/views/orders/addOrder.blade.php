@section('title')
    <li class="breadcrumb-item"><a href="/orders">Baza zleceń</a></li>
    <li class="breadcrumb-item">Nowe zlecenie</a></li>
@endsection

@section('content')
    <div ng-controller="AddOrderCtrl">
        <form class="form" action="/orders/addOrder">
            <div class="form-group row">
                <label for="number" class="col-md-2 col-form-label">Nr zlecenia:</label>
                <div class="col-md-4">
                    <input class="form-control form-control-sm" type="text" name="number" value="{{ $number }}" value="" placeholder="{{ $number }}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Wartość netto:</label> 
                <div class="col-md-4">
                    <input type="text" name="value" placeholder="Wartość netto... 0.00" class="form-control form-control-sm" />
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Miejsce montażu/dostawy:</label> 
                <div class="col-md-4">
                    <input type="text" name="placeMonter" placeholder="Miejsce montażu/dostawy..." class="form-control form-control-sm" />
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Waluta:</label> 
                <div class="col-md-4">
                    <select name="currency_id" class="form-control form-control-sm">
                    @foreach ($currencys as $currency)
                        <option value="{{ $currency->id }}">{{ $currency->longName }} - {{ $currency->shortName }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Stawka VAT:</label> 
                <div class="col-md-4">
                    <select name="vat_id" class="form-control form-control-sm">
                    @foreach ($vats as $vat)
                        <option value="{{ $vat->id }}">{{ $vat->value }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Status zlecenia:</label> 
                <div class="col-md-4">
                    <select name="status_id" class="form-control form-control-sm">
                    @foreach ($statuses as $status)
                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Opis:</label> 
                <div class="col-md-4">
                    <textarea name="description" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="monter" name="monter">
                    <label class="form-check-label" for="monter">
                    Zlecenie z montażem
                    </label>
                  </div>
                </div>
            </div>
            @if ($client_id == null)
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="name" class="col-md-2 col-form-label">Kontrahent:</label> 
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <input type="text" name="search_client" ng-model="search_client" placeholder="Nazwa kontrahenta..." class="form-control form-control-sm" />
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <select multiple class="form-control" id="client" name="client_id">
                        <option ng-repeat="client in clients.data | filter: { name : search_client }"  value="<% client.id %>"><% client.name %></option>
                    </select>
                </div>
            </div> 
            @endif
            
            @if ($client_id != null)
            <div class="form-group row">
                <label for="number" class="col-md-2 col-form-label">Kontrahent:</label>
                <div class="col-md-4">
                    <input type="hidden" name="client_id" value="{{ $client_id }}" />
                    <input class="form-control form-control-sm" type="text" value="{{ $client_name }}" value="{{ $client_name }}" placeholder="{{ $client_name }}" readonly>
                </div>
            </div>     
            @endif

            <div class="form-group row">
                <div class="col-md-6">
                    <input type="submit" name="addOrder" value="Utwórz zlecenie" class="btn btn-primary btn-all" />
                </div>
            </div>

            
        </form>
    </div>
@endsection

@include('general.index')