@section('title')
    <li class="breadcrumb-item"><a href="/admins">Panel Administratora</a></li>
    <li class="breadcrumb-item"><a href="/admins/permisions">Stanowiska</a></li>
    <li class="breadcrumb-item">Edycja stanowiska</a></li>
@endsection

@section('content')

<div class="row">
    <div class="col-md-6">
        <form class="form" action="/admins/permisions/savePermision">
            <input type="hidden" name="id" value="{{$permision[0]->id}}" />

            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Nazwa:</label> 
                <div class="col-md-10">
                    <input type="text" name="name" placeholder="Nazwa..." value="{{$permision[0]->name }}" class="form-control form-control-sm" />
                </div>
            </div>

            <div class="form-group row">
                    <input type="submit" name="savePermision" value="ZAPISZ" class="btn btn-block btn-primary"/>
            </div>
        </form>
    </div>
</div>
@endsection

@include('general.index')