@section('title')
    <li class="breadcrumb-item"><a href="/clients">Baza kontrahentów</a></li>
    <li class="breadcrumb-item"><a href="/clients/view/{{ $client[0]->id }}">Kontrahent - {{ $client[0]->name}} </a></li>
    <li class="breadcrumb-item">Nowa notatka</li>
@endsection

@section('content')
    <form class="form" action="/clients/addNote">
        <div class="form-group row">
            <input type="hidden" name="client_id" value="{{ $client[0]->id }}" />
            <label for="number" class="col-md-2 col-form-label">Opis:</label>
            <div class="col-md-4">
                <textarea name="description" class="form-control"></textarea>                
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <input type="submit" name="addNote" value="Utwórz notatkę" class="btn btn-primary btn-all" />
            </div>
        </div>
    </form>
@endsection

@include('general.index')