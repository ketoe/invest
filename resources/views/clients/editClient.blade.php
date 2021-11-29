@section('title')
    <li class="breadcrumb-item"><a href="/clients">Baza kontrahentów</a></li>
    <li class="breadcrumb-item">{{ $client[0]->name }}</li>
@endsection

@section('content')

<div class="row">
    <div class="col-md-6">
        <form class="form" action="/clients/saveClient">
            <input type="hidden" name="id" value="{{$client[0]->id}}" />

            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Nazwa:</label> 
                <div class="col-md-10">
                    <input type="text" name="name" placeholder="Nazwa..." value="{{$client[0]->name }}" class="form-control form-control-sm" />
                </div>
            </div>

            <div class="form-group row">
                <label for="nip" class="col-md-2 col-form-label">NIP:</label>
                <div class="col-md-10"> 
                    <input type="text" name="nip" placeholder="NIP..." value="{{$client[0]->nip }}" class="form-control form-control-sm" />
                </div>
            </div>

            <div class="form-group row">
                <label for="city" class="col-md-2 col-form-label">Miasto:</label>
                <div class="col-md-10"> 
                    <input type="text" name="city" placeholder="City..." value="{{$client[0]->city }}" class="form-control form-control-sm"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-md-2 col-form-label">Adres:</label>
                <div class="col-md-10"> 
                    <input type="text" name="address" placeholder="Adres..." value="{{$client[0]->address }}" class="form-control form-control-sm"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="regon" class="col-md-2 col-form-label">Regon:</label>
                <div class="col-md-10"> 
                    <input type="text" name="regon" placeholder="Regon..." value="{{$client[0]->regon }}" class="form-control form-control-sm"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="krs" class="col-md-2 col-form-label">KRS:</label>
                <div class="col-md-10">
                    <input type="text" name="krs" placeholder="KRS..." value="{{$client[0]->krs }}" class="form-control form-control-sm"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="telephone" class="col-md-2 col-form-label">Nr telefonu:</label>
                <div class="col-md-10">
                    <input type="text" name="telephone" placeholder="000-000-000" value="{{$client[0]->telephone }}" class="form-control form-control-sm"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="mail" class="col-md-2 col-form-label">Mail:</label>
                <div class="col-md-10">
                    <input type="text" name="mail" placeholder="Mail..." value="{{$client[0]->mail }}" class="form-control form-control-sm"/>
                </div>
            </div>

            <div class="form-group row">
                    <input type="submit" name="addClient" value="ZAPISZ" class="btn btn-block btn-primary"/>
            </div>
        </form>
    </div>
</div>
@endsection

@include('general.index')