@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{!! trans('home.contact') !!}</div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="name" class="h4">{!! trans('auth.name') !!}</label>
                                <input ng-model="email.name" type="text" class="form-control" id="name" placeholder="{!! trans('home.name') !!}" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="email" class="h4">{!! trans('auth.email') !!}</label>
                                <input ng-model="email.email" type="email" class="form-control" id="email" placeholder="{!! trans('auth.email') !!}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message" class="h4 ">{!! trans('auth.message') !!}</label>
                            <textarea ng-model="email.message" id="message" class="form-control" rows="5" placeholder="{!! trans('auth.message') !!}" required></textarea>
                        </div>

                        <div class="form-group">
                            <button ng-click="sendEmail()" style="margin-bottom: 20px" type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">{!! trans('auth.submit') !!}</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
