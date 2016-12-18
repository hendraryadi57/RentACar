@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Cars</b></div>

                    <div class="panel-body">

                        <table class="table table-bordered">
                            <thead>
                            <tr >
                                <th>Make & Model</th>
                                <th>Fuel</th>
                                <th>isAutomatic</th>
                                <th>Branch</th>
                                <th>Registration</th>
                                <th>pricePerDay</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="car in data.cars">
                                <td>@{{ car.make + " " + car.model }}</td>
                                <td>@{{ car.fuel }}</td>
                                <td>@{{ car.isAutomatic }}</td>
                                <td>@{{ car.name }}</td>
                                <td>@{{ car.registration }}</td>
                                <td>@{{ car.pricePerDay }}</td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="form-group">
                            <label for="make">Select A Make</label>
                            <select ng-required="required" ng-model="vars.addCar.make"  ng-options="item.make as item.make for item in data.makes" class="form-control">
                                <option value="">-</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="make">Select A Model</label>
                            <select ng-required="required" ng-model="vars.addCar.model"  ng-options="item.model as item.model for item in data.models | filter:{'make':  vars.addCar.make}" class="form-control">
                                <option value="">-</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="make">Select A Fuel</label>
                            <select ng-required="required" ng-model="vars.addCar.fuel"  ng-options="item.fuel as item.fuel for item in data.fuels" class="form-control">
                                <option value="">-</option>
                            </select>
                        </div>

                        <!--
                        <div class="form-group">
                            <label for="make">Select A Color</label>
                            <select ng-model="vars.addCar.color"  ng-options="item.color as item.color for item in data.colors" class="form-control">
                                <option value="">-</option>
                            </select>
                        </div>
                        -->

                        <div class="form-group">
                            <label for="make">Select A Class</label>
                            <select required ng-model="vars.addCar.class"  ng-options="item.class as item.class for item in data.classes" class="form-control">
                                <option value="">-</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="make">Select A Branch</label>
                            <select required ng-model="vars.addCar.branch"  ng-options="item.name as item.name for item in data.branches" class="form-control">
                                <option value="">-</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="make">Enter Registration</label>
                            <input ng-model="vars.addCar.registration" type="text" class="form-control">
                        </div>

                        <!--
                        <div class="form-group">
                            <label for="make">Enter Year</label>
                            <input ng-model="vars.addCar.year" type="text" class="form-control">
                        </div>
                        -->

                        <div class="form-group">
                            <label for="make">Enter Capacity</label>
                            <input ng-required="required" ng-model="vars.addCar.capacity" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="make">Gearbox</label>
                            <select ng-required="required" ng-model="vars.addCar.isAutomatic" ng-init="vars.addCar.isAutomatic = undefined" class="form-control">
                                <option value="">-</option>
                                <option value="true">Yes</option>
                                <option value="false" >No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="make">Enter Min Age</label>
                            <input ng-required="required" ng-model="vars.addCar.minAge" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="make">Enter Price Per Day</label>
                            <input ng-required="required" ng-model="vars.addCar.pricePerDay" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="make">Upload Image</label>
                            <div class="button" ngf-select ng-model="vars.file" name="file" ngf-pattern="'image/*'"
                                 ngf-accept="'image/*'" ngf-max-size="20MB" ngf-min-height="100"
                                 >Select</div>
                        </div>

                        <button ng-click="addCar();" class="btn btn-primary">Add Car</button>

                        <div ng-show="flashMessages.required">
                            Make sure everything is filled
                        </div>


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
                                <th>Make</th>
                                <th>Model</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="model in data.models | orderBy:model.make">
                                <td>@{{ model.make }}</td>
                                <td>@{{ model.model }}</td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="form-group">
                            <label for="make">Enter Model Name:</label>
                            <input ng-model="vars.addModel.model" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="make">Enter Branch City:</label>
                            <select  ng-change="" ng-model="vars.addModel.make" ng-options="item.make as item.make for item in data.makes" class="form-control">
                                <option value="">-</option>
                            </select>
                        </div>

                        <button ng-click="addModel();" class="btn btn-primary">Add Model</button>



                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Branches</b></div>

                    <div class="panel-body">

                        <table class="table table-bordered">
                            <thead>
                            <tr >
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>City</th>
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
                            </tr>
                            </tbody>
                        </table>

                        <div class="form-group">
                            <label for="make">Enter Branch Name:</label>
                            <input ng-model="vars.addBranch.name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="make">Enter Branch Email:</label>
                            <input ng-model="vars.addBranch.email" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="make">Enter Branch Phone:</label>
                            <input ng-model="vars.addBranch.phone" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="make">Enter Branch Address:</label>
                            <input ng-model="vars.addBranch.address" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="make">Enter Branch City:</label>
                            <select  ng-change="" ng-model="vars.addBranch.city" ng-options="item.city as item.city for item in data.cities" class="form-control">
                                <option value="">-</option>
                            </select>
                        </div>

                        <button ng-click="addBranch();" class="btn btn-primary">Add Branch</button>



                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Makes</b></div>

                    <div class="panel-body">

                        <table class="table table-bordered">
                            <thead>
                                <tr >
                                    <th>ID</th>
                                    <th>Make</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="make in data.makes">
                                    <td>@{{ make.id }}</td>
                                    <td>@{{ make.make }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="form-group">
                            <label for="make">Enter new make:</label>
                            <input ng-model="vars.addMake" type="text" id="make-input" name="make-input" class="form-control"  placeholder="Enter new make">
                        </div>
                        <button ng-click="addMake();" id="add-make" class="btn btn-primary">Add Make</button>



                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Fuels</b></div>

                    <div class="panel-body">

                        <table class="table table-bordered">
                            <thead>
                            <tr >
                                <th>ID</th>
                                <th>Fuel</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="fuel in data.fuels">
                                <td>@{{ fuel.id }}</td>
                                <td>@{{ fuel.fuel }}</td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="form-group">
                            <label for="make">Enter new fuel:</label>
                            <input ng-model="vars.addFuel" type="text" id="fuel-input" name="fuel-input" class="form-control"  placeholder="Enter new make">
                        </div>
                        <button ng-click="addFuel();" id="add-fuel" class="btn btn-primary">Add Fuel</button>



                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Extras</b></div>

                    <div class="panel-body">

                        <table class="table table-bordered">
                            <thead>
                            <tr >
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="extra in data.extras">
                                <td>@{{ extra.id }}</td>
                                <td>@{{ extra.title }}</td>
                                <td>@{{ extra.description }}</td>
                                <td>@{{ extra.price }}</td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="form-group">
                            <label for="make">Enter Title:</label>
                            <input ng-model="vars.addExtra.title" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="make">Enter Description:</label>
                            <input ng-model="vars.addExtra.description" type="text"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="make">Enter Price:</label>
                            <input ng-model="vars.addExtra.price" type="text" class="form-control">
                        </div>
                        <button ng-click="addExtra();" id="add-extra" class="btn btn-primary">Add Extra</button>



                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Cities</b></div>

                    <div class="panel-body">

                        <table class="table table-bordered">
                            <thead>
                            <tr >
                                <th>ID</th>
                                <th>City</th>
                                <th>Postcode</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="city in data.cities">
                                <td>@{{ city.id }}</td>
                                <td>@{{ city.city }}</td>
                                <td>@{{ city.postcode }}</td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="form-group">
                            <label for="make">Enter City Name:</label>
                            <input ng-model="vars.addCity.city" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="make">Enter Postcode:</label>
                            <input ng-model="vars.addCity.postcode" type="text"  class="form-control">
                        </div>
                        <button ng-click="addCity();" class="btn btn-primary">Add City</button>



                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Classes</b></div>

                    <div class="panel-body">

                        <table class="table table-bordered">
                            <thead>
                            <tr >
                                <th>ID</th>
                                <th>Class</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="class in data.classes">
                                <td>@{{ class.id }}</td>
                                <td>@{{ class.class }}</td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="form-group">
                            <label for="make">Enter Class:</label>
                            <input ng-model="vars.addClass" type="text" class="form-control">
                        </div>
                        <button ng-click="addClass();" class="btn btn-primary">Add Class</button>



                    </div>
                </div>
            </div>
        </div>

        <!--
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Colors</b></div>

                    <div class="panel-body">

                        <table class="table table-bordered">
                            <thead>
                            <tr >
                                <th>ID</th>
                                <th>Color</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="color in data.colors">
                                <td>@{{ color.id }}</td>
                                <td>@{{ color.color }}</td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="form-group">
                            <label for="make">Enter Color:</label>
                            <input ng-model="vars.addColor" type="text" class="form-control">
                        </div>
                        <button ng-click="addColor();" class="btn btn-primary">Add Color</button>



                    </div>
                </div>
            </div>
        </div>
        -->

    </div>

@endsection