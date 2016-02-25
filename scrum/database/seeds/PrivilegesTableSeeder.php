<?php

use Illuminate\Database\Seeder;
use App\Privilege;

class PrivilegesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Privilege::create([
            'title' => 'Admin',
            'page_id' => 1,
            'create' => 1,
            'read' => 1,
            'update' => 1,
            'delete' => 1,
        ]);

        Privilege::create([
            'title' => 'User',
            'page_id' => 1,
            'create' => 1,
            'read' => 1,
            'update' => 1,
            'delete' => 1,
        ]);

    }
}
