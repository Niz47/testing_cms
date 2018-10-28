@extends('admin.admin_layout')
@section('content')
<div class="container admin-container">
	<div class="col-xs-8 col-xs-offset-2 well">
		<h2>Edit</h2>
		{!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'method'=>'PATCH']) !!}
			@include('admin.users._form')
		{!! Form::close() !!}
	</div>	
</div>
@endsection

