@section('title')
    <li class="breadcrumb-item">Baza kontrahentów</li>
@endsection

@section('content')
    <div ng-controller="ClientsCtrl">
        <a href="/clients/formAddClient" class="btn btn-primary btn-sm">Nowy Kontrahent</a>

        <table class="table table-striped table-hover table-sm">
            <thead class="thead-light">
                <tr>
                    <th class="col">#</th>
                    <th class="col">Nazwa</th>
                    <th class="col">NIP</th>
                    <th class="col">Regon</th>
                    <th class="col">Miasto</th>
                    <th class="col">Adres</th>
                    <th class="col">Kontakt</th>
                    <th class="col">Mail</th>
                    <th class="col"></th>
                </tr>
                <tr>
                    <th class="col"><input type="text" name="id" placeholder="id..." class="form-control search-table" ng-model="searchId"></th>
                    <th class="col"><input type="text" name="name" placeholder="Nazwa..." class="form-control search-table" ng-model="searchName"></th>
                    <th class="col"><input type="text" name="nip" placeholder="NIP..." class="form-control search-table" ng-model="searchNip"></th>
                    <th class="col"><input type="text" name="regon" placeholder="Regon..." class="form-control search-table" ng-model="searchRegon"></th>
                    <th class="col"><input type="text" name="city" placeholder="Miasto..." class="form-control search-table" ng-model="searchCity"></th>
                    <th class="col"><input type="text" name="address" placeholder="Adres..." class="form-control search-table" ng-model="searchAddress"></th>
                    <th class="col"><input type="text" name="telephone" placeholder="Kontakt..." class="form-control search-table" ng-model="searchTelephone"></th>
                    <th class="col"><input type="text" name="mail" placeholder="Mail..." class="form-control search-table" ng-model="searchMail"></th>
                    <th></th>
                </tr>
            </thead>
            <tr ng-repeat="client in clients.data | filter: 
            { 
                id : searchId, 
                name : searchName,
                nip : sarchNip,
                regon : searchRegon,
                city : searchCity,
                address : searchAddress,
                telephone : searchTelephone,
                mail : searchMail
            }">
                <td><% client.id  %></td>
                <td><% client.name %></td>
                <td><% client.nip %></td>
                <td><% client.regon %></td>
                <td><% client.city %></td>
                <td><% client.address %></td>
                <td><% client.telephone %></td>
                <td><% client.mail %></td>
                <td>
                    <a href="/clients/view/<% client.id %>"><div class="btn-loop"></div></a>
                    <a href="/clients/edit/<% client.id %>"><div class="btn-edit"></div></a>
                    <a href="/clients/delete/<% client.id %>"><div class="btn-delete"></div></a>
                </td>
            </tr>
        </table>
    </div>
@endsection

@include('general.index')