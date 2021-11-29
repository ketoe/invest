@section('title')
    <li class="breadcrumb-item">Panel Administratora</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <a href="/admins/vat" class="btn btn-block btn-primary btn-all">Wartości VAT</a>
            <a href="/admins/currency" class="btn btn-block btn-primary btn-all">Lista Walut</a>
            <a href="/admins/statuses" class="btn btn-block btn-primary btn-all">Lista statusów zleceń</a>
            <a href="/admins/permisions" class="btn btn-block btn-primary btn-all">Lista stanowisk</a>
            <a href="/admins/users" class="btn btn-block btn-primary btn-all">Użytkownicy</a>
        </div>
    </div>
@endsection

@include('general.index')