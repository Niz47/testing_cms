<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

    	//Role Seeder
        $roles = [
            ['name' => 'superadmin', 'display_name' => 'Super Admin', 'description' => 'Allowed to do all.'],
            ['name' => 'admin', 'display_name' => 'Admin', 'description' => 'User is allowed to manage and edit other users.'],
            ['name' => 'user', 'display_name' => 'User', 'description' => 'Default role given to new login.']
        ];

        foreach ($roles as $role) Role::firstOrCreate($role);

        $superAdmin = Role::whereName('superadmin')->first();

        // Permission Seeder
        $permissions = ['view', 'edit', 'delete', 'create'];

        // Use snake case
        $controllers = ['role', 'user'];

        $custom = [
            'manage-translations' => "Can manage translations"
        ];

        foreach ($permissions as $permission) {
            foreach ($controllers as $controller) {

                if (is_array($controller)) {
                    $cond = reset($controller);
                    if (!in_array($permission, $cond)) continue;
                    $controller = key($controller);
                }

                $name = "$controller-$permission";
                $display_controller = str_replace(array('-', '_'), ' ', str_plural($controller));
                $display_name = $display_controller . ucwords(" $permission");
                $perm = Permission::firstOrNew(compact('name'));

                $perm->display_name = $display_name;
                $perm->description = "Can $permission " . $display_controller;

                if (!$perm->exists) {
                    $perm->save();
                    if ($superAdmin) $superAdmin->attachPermission($perm);
                }


            }
        }

        foreach ($custom as $permission => $description) {
            $name = $permission;
            $display_name = ucwords(str_replace("-", " ", $permission));
            $perm = Permission::firstOrNew(compact('name', 'display_name'));
            if (!$perm->exists) {
                $perm->description = $description;
                $perm->save();
                if ($superAdmin) $superAdmin->attachPermission($perm);
            }
        }
    }
}
