@extends('layouts.app')
@section('content')
<div class="container admin-container">
	<div class="col-xs-8 col-xs-offset-2 well">
	<h2>Edit</h2>
	{!! Form::model($role, ['route' => ['admin.roles.update', $role->id], 'method'=>'PATCH']) !!}
		@include('admin.roles._form')
	{!! Form::close() !!}
	</div>
</div>
@endsection