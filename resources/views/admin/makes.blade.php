@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>{!! trans('admin.makes') !!}</b></div>

                    <div class="panel-body">

                        <table class="table table-bordered">
                            <thead>
                            <tr >
                                <th>{!! trans('admin.id') !!}</th>
                                <th>{!! trans('admin.make') !!}</th>
                                <th>{!! trans('admin.action') !!}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="make in data.makes">
                                <td>@{{ make.id }}</td>
                                <td>@{{ make.make }}</td>
                                <td>
                                    <button ng-click="editMake(make.id);" class="btn">{!! trans('admin.edit') !!}</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="form-group">
                            <label for="make">{!! trans('admin.enter_make') !!}</label>
                            <input ng-model="vars.addMake.make" type="text" id="make-input" name="make-input" class="form-control"  placeholder="Enter new make">
                        </div>
                        <div ng-show="flashMessages.makeRequired">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-danger">{!! trans('admin.requested') !!}</p>
                                </div>
                            </div>
                        </div>
                        <button ng-click="addMake();" id="add-make" class="btn btn-primary">{!! trans('admin.add_make') !!}</button>



                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Models</b></div>

                    <div class="panel-body">

                        <table class="table table-bordered">
                            <thead>
                            <tr >
                                <th>{!! trans('admin.make') !!}</th>
                                <th>{!! trans('admin.model') !!}</th>
                                <th>{!! trans('admin.action') !!}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="model in data.models | orderBy:model.make">
                                <td>@{{ model.make }}</td>
                                <td>@{{ model.model }}</td>
                                <td>
                                    <button ng-click="editModel(model.id);" class="btn">{!! trans('admin.edit') !!}</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>


                        <div class="form-group">
                            <label for="make">{!! trans('admin.select_make') !!}</label>
                            <select  ng-change="" ng-model="vars.addModel.make" ng-options="item.make as item.make for item in data.makes" class="form-control">
                                <option value="">-</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="make">{!! trans('admin.enter_model') !!}</label>
                            <input ng-model="vars.addModel.model" type="text" class="form-control">
                        </div>
                        <div ng-show="flashMessages.modelRequired">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-danger">{!! trans('admin.requested') !!}</p>
                                </div>
                            </div>
                        </div>
                        <button ng-click="addModel();" class="btn btn-primary">{!! trans('admin.add_model') !!}</button>



                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection