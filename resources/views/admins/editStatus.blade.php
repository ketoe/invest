@section('title')
    <li class="breadcrumb-item"><a href="/admins">Panel Administratora</a></li>
    <li class="breadcrumb-item"><a href="/admins/statuses">Lista statusów</a></li>
    <li class="breadcrumb-item">Edycja statusu</a></li>
@endsection

@section('content')

<div class="row">
    <div class="col-md-6">
        <form class="form" action="/admins/statuses/saveStatus">
            <input type="hidden" name="id" value="{{$status[0]->id}}" />

            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Nazwa:</label> 
                <div class="col-md-10">
                    <input type="text" name="name" placeholder="Nazwa..." value="{{$status[0]->name }}" class="form-control form-control-sm" />
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Kolor:</label> 
                <div class="col-md-10">
                    <input type="color" name="color" placeholder="Kolor..." value="{{$status[0]->color }}" class="form-control form-control-sm" />
                </div>
            </div>

            <div class="form-group row">
                    <input type="submit" name="saveStatus" value="ZAPISZ" class="btn btn-block btn-primary"/>
            </div>
        </form>
    </div>
</div>
@endsection

@include('general.index')