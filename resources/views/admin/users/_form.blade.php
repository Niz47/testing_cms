<div class="form-group">
	{!! Form::label('email', 'Email:') !!}
	{{ $user->email }}
</div>
<div class="form-group">
	{!! Form::label('name', 'Name') !!}
	{!! Form::text( 'name', null, array( 'id' => 'name','class' => 'form-control',)) !!}
</div>

<div class="form-group">
	{!! Form::label('role', 'Role') !!}
	{!! Form::select('role', [null=>'Please Select']+App\Role::pluck('display_name', 'id')->all(), @$user->role()->id,
	array( 'id' => 'role','class' => 'form-control')) !!}
</div>

<button type="submit" class="btn btn-primary">Save</button>
<a href="{{ route('admin.users.index') }}" class="btn btn-default">Cancel</a>
