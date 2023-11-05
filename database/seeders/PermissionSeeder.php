<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            ['id' => 1, 'name' => 'CAN_VIEW_ADMIN', 'guard_name' => 'web'],
            ['id' => 2, 'name' => 'CAN_CREATE_ADMIN', 'guard_name' => 'web'],
            ['id' => 3, 'name' => 'CAN_EDIT_ADMIN', 'guard_name' => 'web'],
            ['id' => 4, 'name' => 'CAN_DELETE_ADMIN', 'guard_name' => 'web'],
            ['id' => 5, 'name' => 'HAS_ALL_ADMIN_ACCESS', 'guard_name' => 'web'],

            ['id' => 6, 'name' => 'CAN_VIEW_MANAGER', 'guard_name' => 'web'],
            ['id' => 7, 'name' => 'CAN_CREATE_MANAGER', 'guard_name' => 'web'],
            ['id' => 8, 'name' => 'CAN_EDIT_MANAGER', 'guard_name' => 'web'],
            ['id' => 9, 'name' => 'CAN_DELETE_MANAGER', 'guard_name' => 'web'],
            ['id' => 10, 'name' => 'HAS_ALL_MANAGERS_ACCESS', 'guard_name' => 'web'],

            ['id' => 11, 'name' => 'CAN_VIEW_AGENT', 'guard_name' => 'web'],
            ['id' => 12, 'name' => 'CAN_CREATE_AGENT', 'guard_name' => 'web'],
            ['id' => 13, 'name' => 'CAN_EDIT_AGENT', 'guard_name' => 'web'],
            ['id' => 14, 'name' => 'CAN_DELETE_AGENT', 'guard_name' => 'web'],
            ['id' => 15, 'name' => 'HAS_ALL_AGENT_ACCESS', 'guard_name' => 'web'],

            ['id' => 16, 'name' => 'CAN_VIEW_USER', 'guard_name' => 'web'],
            ['id' => 17, 'name' => 'CAN_CREATE_USER', 'guard_name' => 'web'],
            ['id' => 18, 'name' => 'CAN_EDIT_USER', 'guard_name' => 'web'],
            ['id' => 19, 'name' => 'CAN_DELETE_USER', 'guard_name' => 'web'],
            ['id' => 20, 'name' => 'HAS_ALL_USERS_ACCESS', 'guard_name' => 'web'],

            ['id' => 21, 'name' => 'CAN_VIEW_BUSINESS_MANAGER_USER', 'guard_name' => 'web'],
            ['id' => 22, 'name' => 'CAN_CREATE_BUSINESS_MANAGER_USER', 'guard_name' => 'web'],
            ['id' => 23, 'name' => 'CAN_EDIT_BUSINESS_MANAGER_USER', 'guard_name' => 'web'],
            ['id' => 24, 'name' => 'CAN_DELETE_BUSINESS_MANAGER_USER', 'guard_name' => 'web'],
            ['id' => 25, 'name' => 'HAS_ALL_BUSINESS_MANAGER_USERS_ACCESS', 'guard_name' => 'web'],

            ['id' => 26, 'name' => 'CAN_VIEW_PRODUCT', 'guard_name' => 'web'],
            ['id' => 27, 'name' => 'CAN_CREATE_PRODUCT', 'guard_name' => 'web'],
            ['id' => 28, 'name' => 'CAN_EDIT_PRODUCT', 'guard_name' => 'web'],
            ['id' => 29, 'name' => 'CAN_DELETE_PRODUCT', 'guard_name' => 'web'],
            ['id' => 30, 'name' => 'HAS_ALL_PRODUCTS_ACCESS', 'guard_name' => 'web'],

            ['id' => 31, 'name' => 'CAN_VIEW_LOCATION', 'guard_name' => 'web'],
            ['id' => 32, 'name' => 'CAN_CREATE_LOCATION', 'guard_name' => 'web'],
            ['id' => 33, 'name' => 'CAN_EDIT_LOCATION', 'guard_name' => 'web'],
            ['id' => 34, 'name' => 'CAN_DELETE_LOCATION', 'guard_name' => 'web'],
            ['id' => 35, 'name' => 'HAS_ALL_LOCATIONS_ACCESS', 'guard_name' => 'web'],

            ['id' => 36, 'name' => 'CAN_VIEW_ORDER', 'guard_name' => 'web'],
            ['id' => 37, 'name' => 'CAN_CREATE_ORDER', 'guard_name' => 'web'],
            ['id' => 38, 'name' => 'CAN_EDIT_ORDER', 'guard_name' => 'web'],
            ['id' => 39, 'name' => 'CAN_DELETE_ORDER', 'guard_name' => 'web'],
            ['id' => 40, 'name' => 'HAS_ALL_ORDERS_ACCESS', 'guard_name' => 'web'],

            ['id' => 41, 'name' => 'CAN_VIEW_FILE', 'guard_name' => 'web'],
            ['id' => 42, 'name' => 'CAN_UPLOAD_FILE', 'guard_name' => 'web'],
            ['id' => 43, 'name' => 'CAN_EDIT_FILE', 'guard_name' => 'web'],
            ['id' => 44, 'name' => 'CAN_DELETE_FILE', 'guard_name' => 'web'],
            ['id' => 45, 'name' => 'HAS_ALL_FILES_ACCESS', 'guard_name' => 'web'],

            ['id' => 46, 'name' => 'CAN_VIEW_COMMISSION', 'guard_name' => 'web'],
            ['id' => 47, 'name' => 'CAN_CREATE_COMMISSION', 'guard_name' => 'web'],
            ['id' => 48, 'name' => 'CAN_EDIT_COMMISSION', 'guard_name' => 'web'],
            ['id' => 49, 'name' => 'CAN_DELETE_COMMISSION', 'guard_name' => 'web'],
            ['id' => 50, 'name' => 'HAS_ALL_COMMISSIONS_ACCESS', 'guard_name' => 'web'],
        ];

        foreach ($permissions as $permission) {
            Permission::query()->updateOrCreate(['id' => $permission['id']], $permission);
        }
    }
}
