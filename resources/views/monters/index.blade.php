@section('title')
    <li class="breadcrumb-item">Montażyści</li>
@endsection

@section('content')
    <div ng-controller="ClientsCtrl">
        <a href="/monters/add" class="btn btn-primary btn-sm">Nowa ekipa montażowa</a>

        <table class="table table-striped table-hover table-sm">
            <thead class="thead-light">
                <tr>
                    <th class="col">#</th>
                    <th class="col">Nazwa</th>
                    <th class="col">NIP</th>
                    <th class="col">Email</th>
                    <th class="col">Kontakt</th>
                    <th class="col">Miasto</th>
                    <th class="col">Adres</th>
                    <th class="col"></th>
                </tr>
                <tr>
                    <th class="col"><input type="text" name="id" placeholder="id..." class="form-control search-table" ng-model="searchId"></th>
                    <th class="col"><input type="text" name="name" placeholder="Nazwa..." class="form-control search-table" ng-model="searchName"></th>
                    <th class="col"><input type="text" name="nip" placeholder="NIP..." class="form-control search-table" ng-model="searchNip"></th>
                    <th class="col"><input type="text" name="email" placeholder="Email..." class="form-control search-table" ng-model="searchEmail"></th>
                    <th class="col"><input type="text" name="phone" placeholder="Nr telefonu..." class="form-control search-table" ng-model="searchPhone"></th>
                    <th class="col"><input type="text" name="city" placeholder="Miasto..." class="form-control search-table" ng-model="searchCity"></th>
                    <th class="col"><input type="text" name="address" placeholder="Adres..." class="form-control search-table" ng-model="searchAddress"></th>                    <th></th>
                </tr>
            </thead>
            <tr ng-repeat="monter in monters.data | filter: 
            { 
                id : searchId, 
                name : searchName,
                nip : sarchNip,
                email : searchEmial,
                phone : searchPhone,
                city : searchCity,
                address : searchAddress,
            }">
                <td><% client.id  %></td>
                <td><% client.name %></td>
                <td><% client.nip %></td>
                <td><% client.email %></td>
                <td><% client.phone %></td>
                <td><% client.city %></td>
                <td><% client.address %></td>
                <td>
                    <a href="/monters/view/<% monter.id %>"><div class="btn-loop"></div></a>
                    <a href="/monters/edit/<% monter.id %>"><div class="btn-edit"></div></a>
                    <a href="/monters/delete/<% monter.id %>"><div class="btn-delete"></div></a>
                </td>
            </tr>
        </table>
    </div>
@endsection

@include('general.index')