@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-4 col-xs-offset-4">
            <div class="login-panel">
                <div class="heading">
                    <h3 class="uppercase">Login</h3>
                </div>
                <div class="login-panel-body">

                    @if (session('ErrMsg'))
                        <div class="alert alert-danger">
                            {{ session('ErrMsg') }}
                        </div>
                    @endif

                    <div style="text-align: center">
                        <a class="btn btn-social btn-lg btn-google-plus"
                           href="{{ url('auth/google') }}"
                                onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-google-plus']);">
                            <i class="fa fa-google-plus"></i> Sign in with Google
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
