@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>{!! trans('admin.fuels') !!}</b></div>

                    <div class="panel-body">

                        <table class="table table-bordered">
                            <thead>
                            <tr >
                                <th>{!! trans('admin.id') !!}</th>
                                <th>{!! trans('admin.fuel') !!}</th>
                                <th>{!! trans('admin.action') !!}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="fuel in data.fuels">
                                <td>@{{ fuel.id }}</td>
                                <td>@{{ fuel.fuel }}</td>
                                <td>
                                    <button ng-click="editFuel(fuel.id);" class="btn">{!! trans('admin.edit') !!}</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="form-group">
                            <label for="make">{!! trans('admin.enter_fuel') !!}</label>
                            <input ng-model="vars.addFuel.fuel" type="text" id="fuel-input" name="fuel-input" class="form-control"  placeholder="Enter new make">
                        </div>
                        <div ng-show="flashMessages.fuelRequired">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-danger">{!! trans('admin.requested') !!}</p>
                                </div>
                            </div>
                        </div>
                        <button ng-click="addFuel();" id="add-fuel" class="btn btn-primary">{!! trans('admin.add_fuel') !!}</button>



                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection