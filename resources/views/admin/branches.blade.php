@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>{!! trans('admin.cities') !!}</b></div>

                    <div class="panel-body">

                        <table class="table table-bordered">
                            <thead>
                            <tr >
                                <th>{!! trans('admin.id') !!}</th>
                                <th>{!! trans('admin.city') !!}</th>
                                <th>{!! trans('admin.postcode') !!}</th>
                                <th>{!! trans('admin.action') !!}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="city in data.cities">
                                <td>@{{ city.id }}</td>
                                <td>@{{ city.city }}</td>
                                <td>@{{ city.postcode }}</td>
                                <td>
                                    <button ng-click="editCity(city.id);" class="btn">{!! trans('admin.edit') !!}</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="form-group">
                            <label for="make">{!! trans('admin.city_name') !!}</label>
                            <input ng-model="vars.addCity.city" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="make">{!! trans('admin.city_postcode') !!}</label>
                            <input ng-model="vars.addCity.postcode" type="text"  class="form-control">
                        </div>

                        <div ng-show="flashMessages.cityRequired">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-danger">{!! trans('admin.requested') !!}</p>
                                </div>
                            </div>
                        </div>

                        <button ng-click="addCity();" class="btn btn-primary">{!! trans('admin.city_add') !!}</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>{!! trans('admin.branches') !!}</b></div>

                    <div class="panel-body">

                        <table class="table table-bordered">
                            <thead>
                            <tr >
                                <th>{!! trans('admin.id') !!}</th>
                                <th>{!! trans('admin.name') !!}</th>
                                <th>{!! trans('admin.email') !!}</th>
                                <th>{!! trans('admin.phone') !!}</th>
                                <th>{!! trans('admin.adrress') !!}</th>
                                <th>{!! trans('admin.city') !!}</th>
                                <th>{!! trans('admin.action') !!}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="branch in data.branches">
                                <td>@{{ branch.id }}</td>
                                <td>@{{ branch.name }}</td>
                                <td>@{{ branch.email }}</td>
                                <td>@{{ branch.phone }}</td>
                                <td>@{{ branch.address }}</td>
                                <td>@{{ branch.city }}</td>
                                <td>
                                    <button ng-click="editBranch(branch.id);" class="btn">{!! trans('admin.edit') !!}</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="form-group">
                            <label for="make">{!! trans('admin.branches_name') !!}</label>
                            <input ng-model="vars.addBranch.name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="make">{!! trans('admin.branches_email') !!}</label>
                            <input ng-model="vars.addBranch.email" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="make">{!! trans('admin.branches_phone') !!}</label>
                            <input ng-model="vars.addBranch.phone" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="make">{!! trans('admin.branches_address') !!}</label>
                            <input ng-model="vars.addBranch.address" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="make">{!! trans('admin.branches_city') !!}</label>
                            <select  ng-change="" ng-model="vars.addBranch.city" ng-options="item.city as item.city for item in data.cities" class="form-control">
                                <option value="">-</option>
                            </select>
                        </div>

                        <div ng-show="flashMessages.branchRequired">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-danger">{!! trans('admin.requested') !!}</p>
                                </div>
                            </div>
                        </div>

                        <button ng-click="addBranch();" class="btn btn-primary">{!! trans('admin.branch_add') !!}</button>



                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection