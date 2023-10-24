<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['id' => 1, 'name' => 'super-admin', 'guard_name' => 'web'],
            ['id' => 2, 'name' => 'admin', 'guard_name' => 'web'],
            ['id' => 3, 'name' => 'manager', 'guard_name' => 'web'],
            ['id' => 4, 'name' => 'agent', 'guard_name' => 'web'],
            ['id' => 5, 'name' => 'user', 'guard_name' => 'web'],
            ['id' => 6, 'name' => 'business-manager', 'guard_name' => 'web'],
            ['id' => 7, 'name' => 'staff', 'guard_name' => 'web'],
            ['id' => 8, 'name' => 'seo-manager', 'guard_name' => 'web'],
        ];

        $adminPermissions = [
            Permission::CAN_VIEW_MANAGER,
            Permission::CAN_CREATE_MANAGER,
            Permission::CAN_EDIT_MANAGER,
            Permission::CAN_DELETE_MANAGER,
            Permission::CAN_VIEW_AGENT,
            Permission::CAN_CREATE_AGENT,
            Permission::CAN_EDIT_AGENT,
            Permission::CAN_DELETE_AGENT,
            Permission::CAN_VIEW_USER,
            Permission::CAN_CREATE_USER,
            Permission::CAN_EDIT_USER,
            Permission::CAN_DELETE_USER,
            Permission::CAN_VIEW_BUSINESS_MANAGER_USER,
            Permission::CAN_CREATE_BUSINESS_MANAGER_USER,
            Permission::CAN_EDIT_BUSINESS_MANAGER_USER,
            Permission::CAN_DELETE_BUSINESS_MANAGER_USER,
            Permission::CAN_VIEW_LOCATION,
            Permission::CAN_CREATE_LOCATION,
            Permission::CAN_EDIT_LOCATION,
            Permission::CAN_DELETE_LOCATION,
            Permission::CAN_VIEW_PRODUCT,
            Permission::CAN_EDIT_PRODUCT,
            Permission::CAN_DELETE_PRODUCT,
            Permission::CAN_CREATE_PRODUCT,
            Permission::CAN_VIEW_ORDER,
            Permission::CAN_CREATE_ORDER,
            Permission::CAN_DELETE_ORDER,
            Permission::CAN_EDIT_ORDER,
            Permission::CAN_VIEW_FILE,
            Permission::CAN_UPLOAD_FILE,
            Permission::CAN_EDIT_FILE,
            Permission::CAN_DELETE_FILE,
            Permission::HAS_ALL_ORDERS_ACCESS,
            Permission::HAS_ALL_LOCATIONS_ACCESS,
            Permission::HAS_ALL_FILES_ACCESS,
            Permission::HAS_ALL_PRODUCTS_ACCESS,
            Permission::HAS_ALL_MANAGERS_ACCESS,
            Permission::HAS_ALL_AGENT_ACCESS,
            Permission::HAS_ALL_USERS_ACCESS,
            Permission::HAS_ALL_BUSINESS_MANAGER_USERS_ACCESS,
        ];

        $agentPermissions = [
            Permission::CAN_VIEW_USER,
            Permission::CAN_CREATE_USER,
        ];

        $userPermissions = [
            Permission::CAN_VIEW_ORDER,
            Permission::CAN_UPLOAD_FILE,
            Permission::CAN_VIEW_PRODUCT
        ];

        $managerPermissions = [];

        $businessManagerPermissions = [];

        $adminPermissions = array_merge(
            $adminPermissions,
            $agentPermissions,
            $userPermissions,
            $businessManagerPermissions,
        );
        $agentPermissions = array_merge($agentPermissions);
        $allPermissions = array_merge($adminPermissions, $agentPermissions, $managerPermissions);

        $rolePermission = [
            Role::SUPER_ADMIN => $allPermissions,
            Role::ADMIN => $adminPermissions,
            ROLE::MANAGER => $managerPermissions,
            ROLE::AGENT => $agentPermissions,
            ROLE::USER => $userPermissions,
            ROLE::BUSINESS_MANAGER => $businessManagerPermissions,
        ];

        foreach ($roles as $role) {
            Log::error("role:" . json_encode($role));
            $newRole = Role::query()->updateOrCreate(['id' => $role['id']], $role);
            if (isset($rolePermission[$newRole->id])) {
                $newRole->givePermissionTo($rolePermission[$newRole->id]);
            }
        }
    }
}
