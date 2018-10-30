@extends('layouts.app')

@section('content')
    <div class="well container admin-container">
<h2>Users List</h2>

<br>
<div class="row">
    <div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                    <th>Role</th>
                  <th></th>
                </tr>
            </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              <td>
                  @if($user->picture)
                      <img style="max-width: 50px;" src="{{ $user->picture }}">
                   @endif
                  &nbsp;{{$user->name}}
              </td>
              <td>{{$user->email}} </td>
                <td>{{@$user->role()->display_name}} </td>
                <td>
                  @if(Auth::user()->can('user-edit'))
                    <a href="{{ route('admin.users.edit', $user->id)}}" class="btn-default btn-xs btn">Edit</a>
                  @endif
                </td>
            </tr>
            @endforeach

          </tbody>
        </table>
    </div>
        {!!  $users->render(); !!}
    </div>
</div>
</div>
@endsection
