<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Menu_user;
use App\Models\Menu;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => 'admin',
                'name_user'=>'Admin',
                'email'=>'admin@admin.com',
                'password'=> bcrypt('123456'),                
                'status_user'=> 'active',
                'create_date' => date('Y-m-d', strtotime('now'))
            ],
            [
                'username' => 'user',
                'name_user'=>'User',
                'email'=>'user@user.com', 
                'password'=> bcrypt('123456'),               
                'status_user'=> 'active',
                'create_date' => date('Y-m-d', strtotime('now'))
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }

        $menu_user = [
            [
                'id_user' => 1,
                'menu_id'=> 1
            ],
            [
                'id_user' => 1,
                'menu_id'=> 2
            ],
            [
                'id_user' => 1,
                'menu_id'=> 3
            ],
            [
                'id_user' => 1,
                'menu_id'=> 4
            ],
            [
                'id_user' => 1,
                'menu_id'=> 5
            ],
            [
                'id_user' => 1,
                'menu_id'=> 6
            ],
            [
                'id_user' => 1,
                'menu_id'=> 7
            ],
            [
                'id_user' => 1,
                'menu_id'=> 8
            ],
            [
                'id_user' => 1,
                'menu_id'=> 9
            ],
            [
                'id_user' => 1,
                'menu_id'=> 10
            ],
            [
                'id_user' => 1,
                'menu_id'=> 11
            ],
            [
                'id_user' => 1,
                'menu_id'=> 12
            ],
            [
                'id_user' => 2,
                'menu_id'=> 6
            ],
            [
                'id_user' => 2,
                'menu_id'=> 10
            ],
        ];

        foreach ($menu_user as $key => $value) {
            Menu_user::create($value);
        }

        $menu = [
            [
                'menu_name' => 'Dashboard',
                'menu_link'=> 'dashboard',
                'menu_icon' => 'bx bx-columns icon',
                'parent_id' => 0,
                'create_date' => date('Y-m-d', strtotime('now'))
            ],
            [
                'menu_name' => 'Menu Management',
                'menu_link'=> 'list-menu',
                'menu_icon' => 'bx bx-columns icon',
                'parent_id' => 0,
                'create_date' => date('Y-m-d', strtotime('now'))
            ],
            [
                'menu_name' => 'User Management',
                'menu_link'=> 'list-user',
                'menu_icon' => 'bx bx-columns icon',
                'parent_id' => 0,
                'create_date' => date('Y-m-d', strtotime('now'))
            ],
            [
                'menu_name' => 'User Activity',
                'menu_link'=> 'user-activity',
                'menu_icon' => 'bx bx-columns icon',
                'parent_id' => 0,
                'create_date' => date('Y-m-d', strtotime('now'))
            ],
            [
                'menu_name' => 'Error Application',
                'menu_link'=> 'error-application',
                'menu_icon' => 'bx bx-columns icon',
                'parent_id' => 0,
                'create_date' => date('Y-m-d', strtotime('now'))
            ],
            [
                'menu_name' => 'HRM System',
                'menu_link'=> '',
                'menu_icon' => 'bx bx-columns icon',
                'parent_id' => 0,
                'create_date' => date('Y-m-d', strtotime('now'))
            ],
            [
                'menu_name' => 'Branch',
                'menu_link'=> 'list-branch',
                'menu_icon' => 'bx bx-columns icon',
                'parent_id' => 6,
                'create_date' => date('Y-m-d', strtotime('now'))
            ],
            [
                'menu_name' => 'Departement',
                'menu_link'=> 'list-department',
                'menu_icon' => 'bx bx-columns icon',
                'parent_id' => 6,
                'create_date' => date('Y-m-d', strtotime('now'))
            ],
            [
                'menu_name' => 'Designation',
                'menu_link'=> 'list-designation',
                'menu_icon' => 'bx bx-columns icon',
                'parent_id' => 6,
                'create_date' => date('Y-m-d', strtotime('now'))
            ],            
            [
                'menu_name' => 'Employee',
                'menu_link'=> 'list-employee',
                'menu_icon' => 'bx bx-columns icon',
                'parent_id' => 6,
                'create_date' => date('Y-m-d', strtotime('now'))
            ],           
            [
                'menu_name' => 'Leave Type',
                'menu_link'=> 'list-leave-type',
                'menu_icon' => 'bx bx-columns icon',
                'parent_id' => 6,
                'create_date' => date('Y-m-d', strtotime('now'))
            ],           
            [
                'menu_name' => 'Leave',
                'menu_link'=> 'list-leave',
                'menu_icon' => 'bx bx-columns icon',
                'parent_id' => 6,
                'create_date' => date('Y-m-d', strtotime('now'))
            ],
        ];

        foreach ($menu as $key => $value) {
            Menu::create($value);
        }
    }
}
