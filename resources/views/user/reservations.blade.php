@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>{!! trans('app.my_reservations') !!}</b></div>

                    <div class="panel-body" ng-init="getUserReservations();">
                        <table class="table table-bordered">
                            <thead>
                            <tr >
                                <th>{!! trans('reservations.car') !!}</th>
                                <th>{!! trans('reservations.office_out') !!}</th>
                                <th>{!! trans('reservations.time_out') !!}</th>
                                <th>{!! trans('reservations.office_in') !!}</th>
                                <th>{!! trans('reservations.time_in') !!}</th>
                                <th>{!! trans('reservations.price') !!}</th>
                                <th>{!! trans('reservations.status') !!}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="r in data.userReservations">
                                <td>@{{ r.make + " " + r.model }}</td>
                                <td>@{{ r.pickupLocation }}</td>
                                <td>@{{ r.pickupDate }}</td>
                                <td>@{{ r.returnLocation }}</td>
                                <td>@{{ r.returnDate }}</td>
                                <td>@{{ r.price }}</td>
                                <td>
                                    <span ng-show="r.isPaid == undefined && r.isPending == undefined && r.isCompleted == undefined">{!! trans('reservations.pending') !!}</span>
                                    <span ng-show="r.isPaid == undefined && r.isPending == 1 && r.isCompleted == undefined">{!! trans('reservations.confirmed') !!}</span>
                                    <span ng-show="r.isPaid == 1 && r.isPending == 1 && r.isCompleted == undefined">{!! trans('reservations.delivered') !!}</span>
                                    <span ng-show="r.isPaid == 1 && r.isPending == 1 && r.isCompleted == 1">{!! trans('reservations.returned') !!}</span>
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