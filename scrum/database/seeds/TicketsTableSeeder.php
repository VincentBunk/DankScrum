<?php

use Illuminate\Database\Seeder;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('tickets')->insert([
		    'title' => 'Ticket 1',
		    'status_id' => 1,
		    'severity_id' => 1,
		    'ticket_type_id' => 1,
		    'description' => str_random(50),
		    'progress' => 50.0,
		    'est_time' => 10.5,
		    'start' => time(),
		    'end' => time(),
		    'user_id' => 1,
		    'creator_id' => 1,
		    'comments_id' => 1,
		    'created_at' => time(),
		    'updated_at' => time()
	    ]);

	    DB::table('tickets')->insert([
		    'title' => 'Ticket 2',
		    'status_id' => 1,
		    'severity_id' => 1,
		    'ticket_type_id' => 1,
		    'description' => str_random(50),
		    'progress' => 10.0,
		    'est_time' => 5.5,
		    'start' => time(),
		    'end' => time(),
		    'user_id' => 1,
		    'creator_id' => 1,
		    'comments_id' => 1,
		    'created_at' => time(),
		    'updated_at' => time()
	    ]);
    }
}
