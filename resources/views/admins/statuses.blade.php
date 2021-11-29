@section('title')
    <li class="breadcrumb-item"><a href="/admins">Panel Administratora</a></li>
    <li class="breadcrumb-item">Statusy zleceń</li>
@endsection

@section('content')
        <table class="table table-striped table-hover table-sm">
            <form action="/admins/statuses/addStatus">
                <div class="row">
                    <div class="col-md-4"><input type="text" name="name" placeholder="Nazwa..." class="form-control" /></div>
                    <div class="col-md-2"><input type="color" name="color" placeholder="Kolor..." class="form-control" /></div>
                    <div class="col-md-2"><input type="submit" name="addStatus" value="Dodaj" class="btn btn-primary" /></div>
                </div>
            </form>
            
            <thead class="thead-light">
                <tr>
                    <th class="col">#</th>
                    <th class="col">Nazwa</th>
                    <th class="col">kolor</th>
                    <th class="col">Podgląd koloru</th>
                    <th class="col"></th>
                </tr>
            </thead>
            @foreach ($statuses as $status) 
                <tr>
                    <td>{{ $status->id }}</td>
                    <td>{{ $status->name }}</td>
                    <td>{{ $status->color }}</td>
                    <td style="background-color:{{$status->color}}"></td>
                    <td><a href="/admins/statuses/edit/{{$status->id}}"><div class="btn-edit"></div></a></td>
                </tr>
            @endforeach
@endsection

@include('general.index')