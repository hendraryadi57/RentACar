@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{!! trans('home.fleet') !!}</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="container-fluid">
                                    @foreach ($cars as $car)
                                    <div class="col-md-6 col-sm-12">
                                        <img src="../../images/{{ $car->img }}" class="img-responsive">
                                    </div>
                                    @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
