@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-xs-12 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div style="float:left"><h5>Profile</h5></div>
                    <a href="{{ url('/profile/edit') }}" style="float:right" class="btn btn-primary">
                        <span style="margin-right: 5px;" class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        Edit
                    </a>
                </div>
                <div class="panel-body">
                        <!-- Display Validation Errors -->
                        @if ($user->profile)
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <span>Name: </span> <span>{{ $user->name }}</span>
                                </li>
                                <li class="list-group-item">
                                    <span>Height: </span> <span>{{ $user->profile->height }}</span>
                                </li>
                                <li class="list-group-item">
                                    <span>Weight: </span> <span>{{ $user->profile->weight }}</span>
                                </li>
                                <li class="list-group-item">
                                    <span>Birthday: </span> <span>{{ \Carbon\Carbon::parse($user->profile->dob)->format($user->profile->dob_format) }}</span>
                                </li>
                            </ul>
                        @else
                            <p>No profile yet.</p>
                        @endif
                    </div>
            </div>
    </div>
@endsection


