<div class="form-group">
	{!! Form::label('display_name', 'Display Name') !!}
	{!! Form::text( 'display_name', null, array( 'id' => 'display_name','class' => 'form-control',)) !!}
</div>
<div class="form-group">
	{!! Form::label('description', 'Description') !!}
	{!! Form::text( 'description', null, array( 'id' => 'description','class' => 'form-control',)) !!}
</div>

<div class="form-group">
	@foreach($permissions as $permission)

		<label class="checkbx">
		{!! Form::checkbox("perm[]", $permission->id, isset($role)? $role->perms()->get()->contains($permission) :null ) !!}
		{{ $permission->display_name }}
		</label>
		({{ $permission->description }})
		<br>

	@endforeach
</div>

<button type="submit" class="btn btn-primary">Save</button>
<a href="{{ route('admin.roles.index') }}" class="btn btn-default">Cancel</a>
