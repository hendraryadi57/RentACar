@extends('layouts.app')

@section('content')
<div class="container">
    @if (!Auth::check())
    <div class="row">
        <div class="alert alert-danger" role="alert">Before trying out the app, visit "/reset" route to initialize DB data</div>
    </div>
    @endif
    <div class="row" id="scope">
        <h3>{!! trans('home.rent_vehicle') !!}</h3>
        <!-- Nav tabs -->
        <!--<ul class="nav nav-tabs" id="tabs" >
          <li class="active"><a href="#time-place"  data-toggle="tab" >Vrijeme i mjesto</a></li>
          <li><a href="#car" data-toggle="tab" aria-controls="car" >Odabir vozila</a></li>
          <li><a href="#extras"  data-toggle="tab" >Dodatne opcije</a></li>
          <li><a href="#client-data"  data-toggle="tab" >Osobni podaci</a></li>
        </ul>-->
        <div class='breadcrumbs' id="tabs">
            <ul class='cf'>
                <li class='active'>
                    <a href="#time-place" data-toggle="tab" ng-class="{disabled: (vars.car)}">
                        <span>1</span>
                        <span>{!! trans('home.time_place') !!}</span>
                    </a>
                </li>
                <li>
                    <a href="#car" data-toggle="tab" ng-class="{disabled: (vars.car)}">
                        <span>2</span>
                        <span>{!! trans('home.select_vehicle') !!}</span>
                    </a>
                </li>
                <li>
                    <a href="#extras" data-toggle="tab" ng-class="{disabled: (vars.extras)}">
                        <span>3</span>
                        <span>{!! trans('home.extras_option') !!}</span>
                    </a>
                </li>
                <li>
                    <a href="#client-data" data-toggle="tab" ng-class="{disabled: (vars.extras)}">
                        <span>4</span>
                        <span>{!! trans('home.personal_data') !!}</span>
                    </a>
                </li>
            </ul>

        </div>

        <!-- Tab panes -->
        <form action="">
            <div class="tab-content">
                <!--Tab za odabir mjesta,datuma i vremena-->
                <div role="tabpanel" class="tab-pane active" id="time-place">
                    <!--Mjesto preuzimanja i vracanja-->
                    <div class="row">
                        <div class="form-group col-lg-4 col-sm-6">
                            <label for="office-out">{!! trans('home.office_out') !!}</label><br>

                            <div class="form-group">
                                <select  ng-change="setLocations();" ng-model="pickupLocation" ng-options="item.name as item.name for item in data.branches" name="pickup-location" id="office-out" class="form-control">
                                    <option value="">-</option>
                                </select>
                            </div>

                            <div class="checkbox">
                                <label><input type="checkbox" ng-model="vars.differentLocations" value="" name="office-in-diff" id="office-in-diff" ng-change="setLocations();">{{ trans('home.different_location') }}</label>
                            </div>
                        </div>
                        <div id="office-in-div" ng-show="vars.differentLocations">
                            <div class="form-group col-lg-4 col-sm-6">
                                <label for="office-in">{!! trans('home.office_in') !!}</label><br>

                                <select  ng-change="setLocations();" ng-model="returnLocation" ng-options="item.name as item.name for item in data.branches" name="return-location" id="office-in" class="form-control">
                                    <option value="">-</option>
                                </select>




                            </div>
                        </div>
                    </div>
                    <!--Datum preuzimanja i vracanja-->
                    <div class="row">
                        <div class="form-group col-lg-4 col-sm-6">
                            <label for="date-out">{!! trans('home.date_out') !!}</label><br>
                            <div class="col-md-8 no-padding">
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" id="date-out"  />



                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ccol-lg-4 col-sm-6">
                            <label for="date-in">{!! trans('home.date_in') !!}</label><br>
                            <div class="col-md-8 no-padding">
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker2'>
                                        <input type='text' class="form-control" id="date-in" />



                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Vrijeme preuzimanja i vracanja-->
                    <div class="row">
                        <div class="form-inline">
                            <div class="form-group col-lg-4 col-sm-6">
                                <label for="time-out">{!! trans('home.time_out') !!}</label><br>
                                <select name="pickupTimeH" id="time-out" class="form-control" ng-model="reservation.pickupTimeH" ng-change="timeDateChange();">
                                    <option value="00">00</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                </select>
                                <select name="pickupTimeM" id="pickupTimeM" class="form-control" ng-model="reservation.pickupTimeM" ng-change="timeDateChange();">
                                    <option value="00">00</option>
                                    <option value="15">15</option>
                                    <option value="30">30</option>
                                    <option value="45">45</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-inline">
                            <div class="form-group col-lg-4 col-sm-6">
                                <label for="time-in">{!! trans('home.time_in') !!}</label><br>

                                <select name="returnTimeH" id="time-in" class="form-control" ng-model="reservation.returnTimeH" ng-change="timeDateChange();">
                                    <option value="00">00</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                </select>
                                <select name="returnTimeM" id="returnTimeM" class="form-control" ng-model="reservation.returnTimeM" ng-change="timeDateChange();">
                                    <option value="00">00</option>
                                    <option value="15">15</option>
                                    <option value="30">30</option>
                                    <option value="45">45</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <!--Pomicanje na sljedeci korak-->
                    <div class="row">
                        <div class="col-md-8 col-sm-6 margin">
                            <a ng-class="{disabled: (!vars.firstStepValid)}" href="#car" aria-controls="car" data-toggle="tab" class="btn btn-default">{!! trans('home.next') !!}</a>

                            <br>
                            <div ng-cloak ng-hide="vars.isUserAuthenticated" style="margin-top:20px;">
                                <div class="alert alert-info" role="alert">In order to make a reservation, please Login or Register</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Tab za odabir vrste auta-->
                <div role="tabpanel" class="tab-pane" id="car">
                    <!--2 dropdown izbornika-->

                    <!--podijela stranice na dva dijela-->
                    <div class="col-md-6 well">
                        <!--Odabir vrste auta-->
                        <div class="col-md-5 no-padding">
                            <div class="form-group">
                                <label for="car-type">{!! trans('home.class') !!}</label>


                                <select  ng-change="" ng-model="vars.carClassSelect" ng-options="item.class as item.class for item in data.classes" name="car-type" id="car-type" class="form-control">
                                    <option value="">-</option>
                                </select>

                            </div>
                        </div>
                        <!--odabir mjenjaca-->
                        <div class="col-md-5 col-md-offset-1 no-padding">
                            <div class="form-group">
                                <label for="gear-type">{!! trans('home.gear') !!}</label>

                                <select ng-model="vars.carGearboxSelect" ng-init="vars.carGearboxSelect = undefined" name="gear-type" id="gear-type" class="form-control">
                                    <option value="">-</option>
                                    <option value="1">{!! trans('home.auto') !!}</option>
                                    <option value="0" >{!! trans('home.manual') !!}</option>
                                </select>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table" id="cars">
                                        <thead>
                                        <tr>
                                            <th>{!! trans('home.car') !!}</th>
                                            <th>{!! trans('home.car_price_hrk') !!}</th>
                                            <th>{!! trans('home.car_price_eur') !!}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-click="setSelected(car.id)" ng-class="{checked: car.id === reservation.selectedCarID}" ng-repeat="car in data.cars | filter:{'class' :vars.carClassSelect||undefined} | filter: {'isAutomatic':  vars.carGearboxSelect||undefined}">
                                                <td class="car-name">
                                                    <span style="display: none;">@{{ car.class }}</span>
                                                    <span style="display: none;">@{{ car.isAutomatic }}</span>
                                                    <input type="hidden" name="car" value="@{{ car.id }}">
                                                    @{{ car.make + " " + car.model }}
                                                </td>
                                                <td class="car-price">@{{ car.pricePerDay }}</td>
                                                <td>@{{  calculateEuros(car.pricePerDay) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!--podjela na dva dijela-->

                    <!--podjela na dva dijela (desni dio)-->
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-sm-6 no-padding-responsive">
                                <div class="well">
                                    <h3>{!! trans('home.start') !!}</h3>
                                    <p class="data-out">@{{ reservation.pickupDate + " @ " + reservation.pickupTimeH + ":" + reservation.pickupTimeM }}</p>
                                </div>
                            </div>
                            <div class="col-sm-6 no-padding-responsive">
                                <div class="well">
                                    <h3>{!! trans('home.end') !!}</h3>
                                    <p class="data-in">@{{ reservation.returnDate + " @ " + reservation.returnTimeH + ":" + reservation.returnTimeM }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 no-padding-responsive">
                                <div class="well">
                                    <h3>{!! trans('home.price_tot') !!}</h3>
                                    <p class="total-price">@{{ reservation.totalPrice }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row" ng-hide="reservation.selectedCarID > -1">
                            <div class="col-md-12 no-padding-responsive">
                                <p>{!! trans('home.select_car') !!}</p>
                            </div>
                        </div>
                        <div class="row" ng-show="reservation.selectedCarID > -1">
                            <div class="col-md-12 no-padding-responsive">
                                <img src="../../images/@{{ reservation.selectedCar.img }}" alt="" class="img-responsive">
                            </div>
                        </div>
                    </div>

                    <!--Pomicanje na sljedeci korak-->
                    <div class="row">
                        <div class="col-md-4">
                            <a href="#time-place" aria-controls="car" data-toggle="tab" class="btn btn-default">{!! trans('home.back') !!}</a>

                            <a ng-class="{disabled: (!vars.secondStepValid)}" href="#extras" aria-controls="extras" data-toggle="tab" class="btn btn-default">{!! trans('home.next') !!}</a>
                        </div>
                    </div>
                </div><!--/panel-->

                <!--dodatne opcije-->
                <div role="tabpanel" class="tab-pane" id="extras">
                    <!--podijela stranice na dva dijela-->
                    <div class="col-md-6 well">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table" id="extra-option">
                                        <thead>
                                        <tr>
                                            <th>{!! trans('home.extra') !!}</th>
                                            <th>{!! trans('home.extra_price_hrk') !!}</th>
                                            <th>{!! trans('home.extra_price_eur') !!}</th>
                                            <th>{!! trans('home.extra_des') !!}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr ng-click="setSelectedExtras(e.id)" ng-class="{checked: reservation.arrayOfSelectedExtras.indexOf(e.id) != -1}" ng-repeat="e in data.extras">

                                            <td>@{{ e.title }}</td>
                                            <td class="extras-price">@{{ e.price }}</td>
                                            <td>@{{ calculateEuros(e.price) }}</td>
                                            <td><a href="#" class="tooltip" data-toggle="tooltip" data-placement="top" title="@{{ e.description }}" style="color:black;">?</a></td>


                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!--podjela na dva dijela-->

                    <!--podjela na dva dijela (desni dio)-->
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-sm-6 no-padding-responsive">
                                <div class="well">
                                    <h3>{!! trans('home.start') !!}</h3>
                                    <p class="data-out">@{{ reservation.pickupDate + " @ " + reservation.pickupTimeH + ":" + reservation.pickupTimeM }}</p>
                                </div>
                            </div>
                            <div class="col-sm-6 no-padding-responsive">
                                <div class="well">
                                    <h3>{!! trans('home.end') !!}</h3>
                                    <p class="data-in">@{{ reservation.returnDate + " @ " + reservation.returnTimeH + ":" + reservation.returnTimeM }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 no-padding-responsive">
                                <div class="well">
                                    <h3>{!! trans('home.price_tot') !!}</h3>
                                    <p class="total-price">@{{ reservation.totalPrice }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row" ng-hide="reservation.selectedCarID > -1">
                            <div class="col-md-12 no-padding-responsive">
                                <p>{!! trans('home.select_car') !!}</p>
                            </div>
                        </div>
                        <div class="row" ng-show="reservation.selectedCarID > -1">
                            <div class="col-md-12 no-padding-responsive">
                                <img src="../../images/@{{ reservation.selectedCar.img }}" alt="" class="img-responsive">
                            </div>
                        </div>
                    </div>
                    <!--Pomicanje na sljedeci korak-->
                    <div class="row">
                        <div class="col-md-4">
                            <a href="#car" aria-controls="car" data-toggle="tab" class="btn btn-default btn-back">{!! trans('home.back') !!}</a>

                            <a href="#client-data" aria-controls="client-data" data-toggle="tab"  class="btn btn-default btn-forward">{!! trans('home.next') !!}</a>
                        </div>
                    </div>
                </div>

                <!--Osobni podaci-->
                <div role="tabpanel" class="tab-pane" id="client-data">
                    <!--ispisuje se ako korisnik nije prijavljen-->
                    <div class="row" ng-hide="vars.isUserAuthenticated">
                        <div class="col-lg-4 col-sm-6">
                            <div class="well">
                                <h4>{!! trans('home.message_login') !!}</h4>                                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#login-modal">Prijava</a>
                                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#register-modal">Registracija</a>
                            </div>
                        </div>
                    </div><!--/row-->

                    <!--ispisuje se ako je korisnik prijavljen-->
                    <div class="row" ng-hide="vars.confirmedReservation">
                        <div class="col-lg-5 col-sm-6">
                            <dl class="dl-horizontal well">
                                <dt>{!! trans('home.name') !!}: </dt>
                                <dd>
                                    @{{ user.name }}
                                </dd>
                                <dt>
                                    {!! trans('home.address') !!}:
                                </dt>
                                <dd>
                                    @{{ user.address + " ," + user.city }}
                                </dd>
                                <dt>
                                    {!! trans('home.contact') !!}:
                                </dt>
                                <dd>
                                    @{{ user.phone }}
                                </dd>
                                <dt>
                                    {!! trans('home.office_out') !!}:
                                </dt>
                                <dd class="office-out-class">
                                    &nbsp;
                                    @{{ reservation.pickupLocation }}
                                </dd>
                                <dt>
                                    {!! trans('home.date_time_out') !!}
                                </dt>
                                <dd class="date-time-out">
                                    @{{ reservation.pickupDate + " @ " + reservation.pickupTimeH + ":" + reservation.pickupTimeM }}
                                </dd>
                                <dt>
                                    {!! trans('home.office_in') !!}:
                                </dt>
                                <dd class="office-in-class">
                                    @{{ reservation.pickupLocation }}
                                </dd>
                                <dt>
                                    {!! trans('home.date_time_in') !!}:
                                </dt>
                                <dd class="date-time-in">
                                    @{{ reservation.returnDate + " @ " + reservation.returnTimeH + ":" + reservation.returnTimeM }}
                                </dd>
                                <dt>
                                    {!! trans('home.car') !!}:
                                </dt>
                                <dd class="chosen-car">
                                    @{{ reservation.selectedCar.make + " " + reservation.selectedCar.model }}
                                </dd>
                                <dt>
                                    {!! trans('home.price_tot') !!}:
                                </dt>
                                <dd class="total-price">
                                    @{{ reservation.totalPrice }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row" ng-hide="vars.confirmedReservation">
                        <div class="col-md-4">
                            <a href="#extras" aria-controls="car" data-toggle="tab" class="btn btn-default btn-back">{!! trans('home.back') !!}</a>

                            <a ng-click="saveReservation();" href="#confirmation" aria-controls="confirmation" data-toggle="tab"  class="btn btn-default">{!! trans('home.conf') !!}</a>
                        </div>
                    </div>
                    <!--Ovo je vidljivo nakon klika na Potvrdi-->
                    <div class="row" ng-hide="!vars.confirmedReservation">
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert">{!! trans('home.success') !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </form><!--End form-->

        <div class="row">
            <div class="col-md-6">
                <h3>{!! trans('home.car_gallery') !!}</h3>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <?php $i=0; ?>
                        @foreach ($cars as $car)
                            @if($i == 0)
                                <div class="item active">
                                    <img src="../../images/{{ $car->img }}" class="img-responsive" >
                                </div>
                            @endif
                            @if($i != 0)
                                <div class="item">
                                    <img src="../../images/{{ $car->img }}" class="img-responsive" >
                                </div>
                            @endif
                            <?php $i++; ?>
                        @endforeach

                    </div>
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <h3>{!! trans('home.why') !!}</h3>
                <p>
                    {!! trans('home.we_offer') !!}
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
