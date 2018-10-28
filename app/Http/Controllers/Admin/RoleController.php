<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use App\Http\Requests\CreateRoleRequest;

class RoleController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$roles = Role::paginate();
		return view('admin.roles.index', compact('roles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$permissions = Permission::orderBy('name')->get();
		return view('admin.roles.create', compact('role','permissions'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateRoleRequest $request,Role $role)
	{
		$input = $request->all();
		$input['name']= str_slug($input['display_name'],'_');
		$role = $role->create($input);

		if (isset($input['perm'])) {
			$role->attachPermissions(Permission::find($input['perm']));
		}
		return redirect()->route('admin.roles.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Role $role)
	{
		return view('admin.roles.show', compact('role'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Role $role)
	{
		$permissions = Permission::orderBy('name')->get();
		return view('admin.roles.edit', compact('role','permissions'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CreateRoleRequest $request, Role $role)
	{
		$input = $request->all();

		$role->detachPermissions($role->perms()->get());

		if (isset($input['perm'])) {
			$role->attachPermissions(Permission::find($input['perm']));
		}

		$role->fill($input)->save();
		return redirect()->route('admin.roles.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Role $role)
	{
		$role->delete();
		return redirect()->route('admin.roles.index');
	}
}
