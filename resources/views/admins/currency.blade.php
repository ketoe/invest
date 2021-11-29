@section('title')
    <li class="breadcrumb-item"><a href="/admins">Panel Administratora</a></li>
    <li class="breadcrumb-item">Lista walut</li>
@endsection

@section('content')
        <table class="table table-striped table-hover table-sm">
            <form action="/admins/currency/addCurrency">
                <div class="row">
                    <div class="col-md-4"><input type="text" name="longName" placeholder="Nazwa..." class="form-control" /></div>
                    <div class="col-md-2"><input type="text" name="shortName" placeholder="Skrócona nazwa..." class="form-control" /></div>
                    <div class="col-md-2"><input type="text" name="value" placeholder="przelicznik..." class="form-control" /></div>
                    <div class="col-md-2"><input type="submit" name="addCurrency" value="Dodaj" class="btn btn-primary" /></div>
                </div>
            </form>
            
            <thead class="thead-light">
                <tr>
                    <th class="col">#</th>
                    <th class="col">Pełna nazwa</th>
                    <th class="col">Skrócona nazwa</th>
                    <th class="col">Przelicznik</th>
                    <th class="col"></th>
                </tr>
            </thead>
            @foreach ($currencys as $currency) 
                <tr>
                    <td>{{ $currency->id }}</td>
                    <td>{{ $currency->longName }}</td>
                    <td>{{ $currency->shortName }}</td>
                    <td>{{ $currency->value }}</td>
                    <td><a href="/admins/currency/edit/{{$currency->id}}"><div class="btn-edit"></div></a></td>
                </tr>
            @endforeach
@endsection

@include('general.index')