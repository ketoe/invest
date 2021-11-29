@section('title')
    <li class="breadcrumb-item"><a href="/admins">Panel Administratora</a></li>
    <li class="breadcrumb-item">Użytkownicy</li>
@endsection

@section('content')
        <table class="table table-striped table-hover table-sm">
            <form action="/admins/users/addUser">
                <div class="row">
                    <div class="col-md-2"><input type="text" name="name" placeholder="Imię..." class="form-control-sm" /></div>
                    <div class="col-md-2"><input type="text" name="surname" placeholder="Nazwisko..." class="form-control-sm" /></div>
                    <div class="col-md-2"><input type="text" name="email" placeholder="Email..." class="form-control-sm" /></div>
                    <div class="col-md-2"><input type="text" name="password" placeholder="Hasło..." class="form-control-sm" /></div>
                    <div class="col-md-2"><input type="submit" name="addUser" value="Dodaj" class="btn btn-primary btn-sm" /></div>
                </div>
            </form>
            
            <thead class="thead-light">
                <tr>
                    <th class="col">#</th>
                    <th class="col">Imię</th>
                    <th class="col">Nazwisko</th>
                    <th class="col">Email</th>
                    <th class="col">Admin</th>
                    <th class="col"></th>
                </tr>
            </thead>
            @foreach ($users as $user) 
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->surname }}</td>
                    <td>{{ $user->email }}</td>
                    <td><div class="icon-check" check="{{ $user->admin }}"></div></td>
                </tr>
            @endforeach
@endsection

@include('general.index')