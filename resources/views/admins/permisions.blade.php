@section('title')
    <li class="breadcrumb-item"><a href="/admins">Panel Administratora</a></li>
    <li class="breadcrumb-item">Stanowiska</li>
@endsection

@section('content')
        <table class="table table-striped table-hover table-sm">
            <form action="/admins/permisions/addPermision">
                <div class="row">
                    <div class="col-md-4"><input type="text" name="name" placeholder="Nazwa..." class="form-control" /></div>
                    <div class="col-md-2"><input type="submit" name="addPermision" value="Dodaj" class="btn btn-primary" /></div>
                </div>
            </form>
            
            <thead class="thead-light">
                <tr>
                    <th class="col">#</th>
                    <th class="col">Nazwa</th>
                    <th class="col"></th>
                </tr>
            </thead>
            @foreach ($permisions as $permision) 
                <tr>
                    <td>{{ $permision->id }}</td>
                    <td>{{ $permision->name }}</td>
                    <td><a href="/admins/permisions/edit/{{$permision->id}}"><div class="btn-edit"></div></a></td>
                </tr>
            @endforeach
@endsection

@include('general.index')