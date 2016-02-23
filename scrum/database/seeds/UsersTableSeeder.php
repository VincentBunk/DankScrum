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
            'name' => 'tester',
            'email' => 'j.hoelzle@exinit.de',
            'password' => bcrypt('tester')
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
