<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Super Admin',
                'email' => 'superadmin@example.com',
                'first_name' => 'super admin',
                'phone' => '123456789',
                'country' => 'Pakistan',
                'city' => 'Lahore',
                'state' => 'Punjab',
                'zip' => '540000',
                'address' => 'N/A',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => bcrypt('p@SSw0rD12()--'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'first_name' => 'admin',
                'phone' => '112345678',
                'country' => 'USA',
                'city' => 'Juneau',
                'state' => 'AK',
                'zip' => '99501',
                'address' => '2345 Fake Address Drive',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => bcrypt('p@SSw0rD()000))'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'name' => 'Manager',
                'email' => 'manager@example.com',
                'first_name' => 'manager',
                'phone' => '345678912',
                'country' => 'USA',
                'city' => 'Little Rock',
                'state' => 'AR',
                'zip' => '71601',
                'address' => '4567 Fake Address Drive',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => bcrypt('p@SSw0rD+++_))'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'name' => 'Agent',
                'email' => 'agent@example.com',
                'first_name' => 'agent',
                'phone' => '234567891',
                'country' => 'USA',
                'city' => 'Phoenix',
                'state' => 'AZ',
                'zip' => '85001',
                'address' => '3456 Fake Address Drive',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => bcrypt('p@SSw0rD'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'name' => 'user',
                'email' => 'user@example.com',
                'first_name' => 'user',
                'phone' => '456789123',
                'country' => 'USA',
                'city' => 'Sacramento',
                'state' => 'CA',
                'zip' => '90001',
                'address' => '6789 Fake Address Drive',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => bcrypt('12345678'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 6,
                'name' => 'business manager',
                'email' => 'business_manager@example.com',
                'first_name' => 'business manager',
                'phone' => '456789123',
                'country' => 'USA',
                'city' => 'Sacramento',
                'state' => 'CA',
                'zip' => '90001',
                'address' => '6789 Fake Address Drive',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => bcrypt('bfdbj^%&^$%%$%hjh()'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 7,
                'name' => 'staff',
                'email' => 'staff@example.com',
                'first_name' => 'staff ',
                'phone' => '456789123',
                'country' => 'USA',
                'city' => 'Sacramento',
                'state' => 'CA',
                'zip' => '90001',
                'address' => '6789 Fake Address Drive',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => bcrypt('bfd5656&^$%%$%hjh()'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 8,
                'name' => 'seo',
                'email' => 'seo_manager@example.com',
                'first_name' => 'seo_manager ',
                'phone' => '456789123',
                'country' => 'USA',
                'city' => 'Sacramento',
                'state' => 'CA',
                'zip' => '90001',
                'address' => '6789 Fake Address Drive',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => bcrypt('099##&^$%%$%hjh()'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];

        $userRole = [
            1 => Role::SUPER_ADMIN,
            2 => Role::ADMIN,
            3 => Role::MANAGER,
            4 => Role::AGENT,
            5 => Role::USER,
            6 => Role::BUSINESS_MANAGER,
            7 => Role::STAFF,
            8 => Role::SEO_MANAGER,
        ];

        foreach ($users as $user) {
            $userObj = User::query()
                ->updateOrCreate([
                    'id' => $user['id']
                ], $user);
            if (isset($userRole[$userObj->id])) {
                $userObj->assignRole(intval($userRole[$userObj->id]));
            }
        }
    }
}
