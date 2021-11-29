@section('title')
    Baza Kontrahentów -> Nowy Kontrahent
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form class="form" action="/clients/addClient">

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">Nazwa:</label> 
                    <div class="col-md-10">
                        <input type="text" name="name" placeholder="Nazwa..." class="form-control form-control-sm" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nip" class="col-md-2 col-form-label">NIP:</label>
                    <div class="col-md-10"> 
                        <input type="text" name="nip" placeholder="NIP..." class="form-control form-control-sm" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="city" class="col-md-2 col-form-label">Miasto:</label>
                    <div class="col-md-10"> 
                        <input type="text" name="city" placeholder="City..." class="form-control form-control-sm"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="address" class="col-md-2 col-form-label">Adres:</label>
                    <div class="col-md-10"> 
                        <input type="text" name="address" placeholder="Adres..." class="form-control form-control-sm"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="regon" class="col-md-2 col-form-label">Regon:</label>
                    <div class="col-md-10"> 
                        <input type="text" name="regon" placeholder="Regon..." class="form-control form-control-sm"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="krs" class="col-md-2 col-form-label">KRS:</label>
                    <div class="col-md-10">
                        <input type="text" name="krs" placeholder="KRS..." class="form-control form-control-sm"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="telephone" class="col-md-2 col-form-label">Nr telefonu:</label>
                    <div class="col-md-10">
                        <input type="text" name="telephone" placeholder="000-000-000" class="form-control form-control-sm"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="mail" class="col-md-2 col-form-label">Mail:</label>
                    <div class="col-md-10">
                        <input type="text" name="mail" placeholder="Mail..." class="form-control form-control-sm"/>
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