@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="row">
                    <ul>
                    @if(App::isLocale('en'))
                        <li><a href="{{url('/lang/my')}}">ျမန္မာ</a></li>
                    @else
                        <li><a href="{{url('/lang/en')}}">English</a></li>
                    @endif
                    </ul>
                </div>

                App -> {{ app()->getLocale() }}
               <br>
               Session -> {{Session::get('langKey')}}
                
                <br>
                @lang('ppv.home')
                @lang('ppv.test1')
<br>
                {{ trans('ppv.home') }}
                {{ trans('ppv.test1') }}

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
