<?php

use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('status')->insert([
		    'title' => 'new',
		    'created_at' => time(),
		    'updated_at' => time(),
	    ]);

	    DB::table('status')->insert([
		    'title' => 'closed',
		    'created_at' => time(),
		    'updated_at' => time(),
	    ]);

	    DB::table('severities')->insert([
		    'title' => 'urgent',
		    'created_at' => time(),
		    'updated_at' => time(),
	    ]);

	    DB::table('severities')->insert([
		    'title' => 'asap',
		    'created_at' => time(),
		    'updated_at' => time(),
	    ]);

	    DB::table('ticket_types')->insert([
		    'title' => 'task',
		    'created_at' => time(),
		    'updated_at' => time(),
	    ]);

	    DB::table('ticket_types')->insert([
		    'title' => 'bug',
		    'created_at' => time(),
		    'updated_at' => time(),
	    ]);
    }
}
