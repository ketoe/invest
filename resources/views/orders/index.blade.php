@section('title')
    <li class="breadcrumb-item">Baza zleceń</li>
@endsection

@section('content')
    <div ng-controller="OrdersCtrl">
        <a href="/orders/formAddOrder" class="btn btn-primary btn-sm">Nowe zlecenie</a>

        <table class="table table-striped table-hover table-sm">
            <thead class="thead-light">
                <tr>
                    <th class="col">#</th>
                    <th class="col">Numer zlecenia</th>
                    <th class="col">Kontrahent</th>
                    <th class="col">Wartość netto</th>
                    <th class="col">Waluta</th>
                    <th class="col">stawka VAT</th>
                    <th class="col">Montaż</th>
                    <th class="col">Status</th>
                    <th class="col"></th>
                </tr>
                <tr>
                    <th class="col"><input type="text" name="id" placeholder="id..." class="form-control search-table" ng-model="searchId"></th>
                    <th class="col"><input type="text" name="number" placeholder="Numer zlecenia..." class="form-control search-table" ng-model="searchNumber"></th>
                    <th class="col"><input type="text" name="client" placeholder="Kontrahent..." class="form-control search-table" ng-model="searchClient"></th>
                    <th class="col"><input type="text" name="value" placeholder="Wartość netto..." class="form-control search-table" ng-model="searchValue"></th>
                    <th class="col"><input type="text" name="currency" placeholder="Waluta..." class="form-control search-table" ng-model="searchCurrency"></th>
                    <th class="col"><input type="text" name="vat" placeholder="VAT..." class="form-control search-table" ng-model="searchVat"></th>
                    <th></th>
                    <th class="col"><input type="text" name="status" placeholder="Status..." class="form-control search-table" ng-model="searchStatus"></th>
                    <th></th>
                </tr>
            </thead>
            <tr ng-repeat="order in orders.data | filter: 
            { 
                id : searchId, 
                number : searchNumber,
                clientName : searchClient,
                value : searchValue,
                currency : searchCurrency,
                vat : searchVat,
                statusName: sarchStatus

            }">
                <td><% order.id  %></td>
                <td><% order.number %></td>
                <td><% order.clientName %></td>
                <td><% order.value %></td>
                <td><% order.currency %></td>
                <td><% order.vat %></td>
                <td><div class="icon-check" check="<% order.monter %>"></div></td>
                <td><% order.statusName %></td>
                <td>
                    {{-- <a href="/orders/view/<% order.id %>"><div class="btn-loop"></div></a>
                    <a href="/orders/edit/<% order.id %>"><div class="btn-edit"></div></a>
                    <a href="/orders/delete/<% order.id %>"><div class="btn-delete"></div></a> --}}
                </td>
            </tr>
        </table>
    </div>
@endsection

@include('general.index')