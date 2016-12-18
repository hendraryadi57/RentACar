@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>{!! trans('admin.extras') !!}</b></div>

                    <div class="panel-body">

                        <table class="table table-bordered">
                            <thead>
                            <tr >
                                <th>{!! trans('admin.id') !!}</th>
                                <th>{!! trans('admin.title') !!}</th>
                                <th>{!! trans('admin.description') !!}</th>
                                <th>{!! trans('admin.price') !!}</th>
                                <th>{!! trans('admin.action') !!}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="extra in data.extras">
                                <td>@{{ extra.id }}</td>
                                <td>@{{ extra.title }}</td>
                                <td>@{{ extra.description }}</td>
                                <td>@{{ extra.price }}</td>
                                <td>
                                    <button ng-click="editExtra(extra.id);" class="btn">{!! trans('admin.edit') !!}</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="form-group">
                            <label for="make">{!! trans('admin.enter_title') !!}</label>
                            <input ng-model="vars.addExtra.title" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="make">{!! trans('admin.enter_des') !!}</label>
                            <input ng-model="vars.addExtra.description" type="text"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="make">{!! trans('admin.enter_price') !!}</label>
                            <input ng-model="vars.addExtra.price" type="text" class="form-control">
                        </div>

                        <div ng-show="flashMessages.extraRequired">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-danger">{!! trans('admin.requested') !!}</p>
                                </div>
                            </div>
                        </div>
                        <button ng-click="addExtra();" id="add-extra" class="btn btn-primary">{!! trans('admin.add_extra') !!}</button>



                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection