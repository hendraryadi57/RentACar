@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>{!! trans('admin.reservations') !!}</b>
                        <button class="btn" ng-click="vars.showCompletedOrders = false" ng-show="vars.showCompletedOrders">{!! trans('admin.hide') !!}</button>
                        <button class="btn" ng-click="vars.showCompletedOrders = true" ng-show="!vars.showCompletedOrders">{!! trans('admin.show') !!}</button>
                    </div>

                    <div class="panel-body" ng-init="getReservations();">
                        <table class="table table-bordered">
                            <thead>
                            <tr >
                                <th>{!! trans('admin.car') !!}</th>
                                <th>{!! trans('admin.dates_locations') !!}</th>
                                <th>{!! trans('admin.price') !!}</th>
                                <th>{!! trans('admin.user') !!}</th>
                                <th>{!! trans('admin.status') !!}</th>
                                <th>{!! trans('admin.action') !!}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr emit-last-repeater-element ng-repeat="r in data.reservations" ng-hide="!vars.showCompletedOrders && r.isCompleted == 1">
                                <td>@{{ r.make + " " + r.model }}</td>
                                <td>
                                    <button tabindex="0" class="btn" role="button" data-toggle="popover" data-trigger="focus" title="{!! trans('admin.dates_locations') !!}" data-html="true"
                                            data-content="<table class='table table-bordered'>
                                       <tr>
                                        <td>{!! trans('admin.office_out') !!}:</td> <td>@{{ r.pickupLocation }}</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('admin.time_out') !!}:</td> <td>@{{ r.pickupDate }}</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('admin.office_in') !!}:</td> <td>@{{ r.returnLocation }}</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('admin.time_in') !!}:</td> <td>@{{ r.returnDate }}</td>
                                       </tr>
                                       </table>" >{!! trans('admin.dates_locations_info') !!}</button>
                                </td>
                                <td>@{{ r.price }}</td>
                                <td>
                                    <button tabindex="0" class="btn" role="button" data-toggle="popover" data-trigger="focus" title="{!! trans('admin.user') !!}" data-html="true"
                                            data-content="<table class='table table-bordered'>
                                       <tr>
                                        <td>{!! trans('admin.client_name') !!}</td> <td>@{{ r.username }}</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('admin.email') !!}:</td> <td>@{{ r.email }}</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('admin.phone') !!}:</td> <td>@{{ r.phone }}</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('admin.adrress') !!}:</td> <td>@{{ r.address }}</td>
                                       </tr>
                                       <tr>
                                        <td>{!! trans('admin.city') !!}:</td> <td>@{{ r.city }}</td>
                                       </tr>
                                       </table>" >{!! trans('admin.user') !!}</button>
                                </td>
                                <td>
                                    <span ng-show="r.isPaid == undefined && r.isPending == undefined && r.isCompleted == undefined">{!! trans('admin.not_conf') !!}</span>
                                    <span ng-show="r.isPaid == undefined && r.isPending == 1 && r.isCompleted == undefined">{!! trans('admin.conf') !!}</span>
                                    <span ng-show="r.isPaid == 1 && r.isPending == 1 && r.isCompleted == undefined">{!! trans('admin.car_del') !!}</span>
                                    <span ng-show="r.isPaid == 1 && r.isPending == 1 && r.isCompleted == 1">{!! trans('admin.car_ret') !!}</span>
                                </td>
                                <td>
                                    <button ng-click="confirmReservation(r.id);" ng-show="r.isPaid == undefined && r.isPending == undefined && r.isCompleted == undefined" class="btn">{!! trans('admin.conf_res') !!}</button>
                                    <button ng-click="carDelivered(r.id);" ng-show="r.isPaid == undefined && r.isPending == 1 && r.isCompleted == undefined" class="btn">{!! trans('admin.car_del') !!}</button>
                                    <button ng-click="carReturned(r.id);" ng-show="r.isPaid == 1 && r.isPending == 1 && r.isCompleted == undefined" class="btn">{!! trans('admin.car_ret') !!}</button>
                                    <span ng-show="r.isPaid == 1 && r.isPending == 1 && r.isCompleted == 1">{!! trans('admin.comp') !!}</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection