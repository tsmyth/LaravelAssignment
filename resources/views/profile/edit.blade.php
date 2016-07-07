@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-xs-12 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div style="float:left"><h5>Profile</h5></div>
                    <a href="{{ url('/profile') }}" style="float:right" class="btn btn-primary">
                        <span style="margin-right: 5px;" class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                        Home
                    </a>
                </div>
                <div class="panel-body">
                    {{ Form::model($user->profile, array('action' => 'ProfileController@store')) }}

                    <!-- Height & Weight Inputs -->
                    <div class="form-group">
                        <!-- Height -->
                        {{ Form::label('height', 'Height') }}
                        {{ Form::number('height', $user->profile->height, ['id' => 'height', 'class' => 'form-control']) }}

                        <!-- Weight -->
                        {{ Form::label('weight', 'Weight') }}
                        {{ Form::number('weight', $user->profile->weight, ['id' => 'weight', 'class' => 'form-control']) }}

                        {{ Form::select('units', array('metric' => 'Cm & Kilograms','imperial' => 'Inches & Pounds'), $user->profile->units, array('id' => 'units')) }}
                    </div>

                    <!-- Birthday Input -->
                    <div class="form-group">
                        {{ Form::label('dob', 'Birthday') }}
                        {{ Form::date('dob', $user->profile->dob, ['class' => 'form-control']) }}
                        {{ Form::select('dob_format', array('m-d-y' => 'mm/dd/yy','m-d-Y' => 'mm/dd/yyyy','d-m-y' => 'dd/mm/yy','d-m-Y' => 'dd/mm/yyyy'), $user->profile->dob_format, array('id' => 'dob_format'))}}
                    </div>

                    {{ Form::submit('Update', ['class' => 'btn btn-danger','style' => 'display:none']) }}
                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
@endsection