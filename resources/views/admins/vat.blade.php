@section('title')
    <li class="breadcrumb-item"><a href="/admins">Panel Administratora</a></li>
    <li class="breadcrumb-item">Lista VAT</li>
@endsection

@section('content')
        <table class="table table-striped table-hover table-sm">
            <form action="/admins/vat/addVat">
                <div class="row">
                    <div class="col-md-2"><input type="numeric" name="value" placeholder="Wartość %" class="form-control" /></div>
                    <div class="col-md-2"><input type="submit" name="addVat" value="Dodaj" class="btn btn-primary" /></div>
                </div>
            </form>
            
            <thead class="thead-light">
                <tr>
                    <th class="col">#</th>
                    <th class="col">Wartość</th>
                    <th class="col"></th>
                </tr>
            </thead>
            @foreach ($vats as $vat) 
                <tr>
                    <td>{{ $vat->id }}</td>
                    <td>{{ $vat->value }}%</td>
                    <td><a href="/admins/vat/edit/{{$vat->id}}"><div class="btn-edit"></div></a></td>
                </tr>
            @endforeach
@endsection

@include('general.index')