@extends('layouts.app')
@section('content')
<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 well">
	<h2>Add a new Role</h2>
	{!! Form::open(array('route'=>'admin.roles.store')) !!}
		@include('admin.roles._form')
	{!! Form::close() !!}
</div>
@endsection
