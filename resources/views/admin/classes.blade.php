@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>{!! trans('admin.classes') !!}</b></div>

                    <div class="panel-body">

                        <table class="table table-bordered">
                            <thead>
                            <tr >
                                <th>{!! trans('admin.id') !!}</th>
                                <th>{!! trans('admin.class') !!}</th>
                                <th>{!! trans('admin.action') !!}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="class in data.classes">
                                <td>@{{ class.id }}</td>
                                <td>@{{ class.class }}</td>
                                <td>
                                    <button ng-click="editClass(class.id);" class="btn">{!! trans('admin.edit') !!}</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="form-group">
                            <label for="make">{!! trans('admin.enter_class') !!}</label>
                            <input ng-model="vars.addClass.class" type="text" class="form-control">
                        </div>


                        <div ng-show="flashMessages.classRequired">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-danger">{!! trans('admin.requested') !!}</p>
                                </div>
                            </div>
                        </div>

                        <button ng-click="addClass();" class="btn btn-primary">{!! trans('admin.add_class') !!}</button>



                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection