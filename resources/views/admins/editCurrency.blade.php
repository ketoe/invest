@section('title')
    <li class="breadcrumb-item"><a href="/admins">Panel Administratora</a></li>
    <li class="breadcrumb-item"><a href="/admins/currency">Lista walut</a></li>
    <li class="breadcrumb-item">Edycja waluty</a></li>
@endsection

@section('content')

<div class="row">
    <div class="col-md-6">
        <form class="form" action="/admins/currency/saveCurrency">
            <input type="hidden" name="id" value="{{$currency[0]->id}}" />

            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Pełna nazwa:</label> 
                <div class="col-md-10">
                    <input type="text" name="longName" placeholder="Pełna nazwa..." value="{{$currency[0]->longName }}" class="form-control form-control-sm" />
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Krótka nazwa:</label> 
                <div class="col-md-10">
                    <input type="text" name="shortName" placeholder="Krótka nazwa..." value="{{$currency[0]->shortName }}" class="form-control form-control-sm" />
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Przelicznik:</label> 
                <div class="col-md-10">
                    <input type="text" name="value" placeholder="Przelicznik..." value="{{$currency[0]->value }}" class="form-control form-control-sm" />
                </div>
            </div>

            <div class="form-group row">
                    <input type="submit" name="saveCurrency" value="ZAPISZ" class="btn btn-block btn-primary"/>
            </div>
        </form>
    </div>
</div>
@endsection

@include('general.index')