<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'admin',
            'email' => 'jan@exinit.de',
            'password' => bcrypt('admin'),
            'role_id' => 1,
        ]);

        User::create([
            'name' => 'tester',
            'email' => 'j.hoelzle@exinit.de',
            'password' => bcrypt('tester'),
            'role_id' => 2,
        ]);

        User::create([
            'name' => 'tester2',
            'email' => 'tester2@tester.de',
            'password' => bcrypt('tester2'),
            'role_id' => 2,
        ]);

//	    DB::table('users')->insert([
//		    'name' => 'tester',
//		    'email' => 'j.hoelzle@exinit.de',
//		    'password' => 'tester',
//	    ]);
//
//	    DB::table('users')->insert([
//		    'name' => 'tester2',
//		    'email' => 'jan@exinit.de',
//		    'password' => 'tester2',
//	    ]);
    }
}
