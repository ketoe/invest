@section('title')
    <li class="breadcrumb-item"><a href="/admins">Panel Administratora</a></li>
    <li class="breadcrumb-item"><a href="/admins/vat">Lista VAT</a></li>
    <li class="breadcrumb-item">Edycja stawki VAT</a></li>
@endsection

@section('content')

<div class="row">
    <div class="col-md-6">
        <form class="form" action="/admins/vat/saveVat">
            <input type="hidden" name="id" value="{{$vat[0]->id}}" />

            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Wartość:</label> 
                <div class="col-md-10">
                    <input type="text" name="value" placeholder="Wartość %..." value="{{$vat[0]->value }}" class="form-control form-control-sm" />
                </div>
            </div>

            <div class="form-group row">
                    <input type="submit" name="saveVat" value="ZAPISZ" class="btn btn-block btn-primary"/>
            </div>
        </form>
    </div>
</div>
@endsection

@include('general.index')