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
		    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
	    ]);

	    DB::table('status')->insert([
		    'title' => 'closed',
		    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
	    ]);

	    DB::table('severities')->insert([
		    'title' => 'urgent',
		    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
	    ]);

	    DB::table('severities')->insert([
		    'title' => 'asap',
		    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
	    ]);

	    DB::table('ticket_types')->insert([
		    'title' => 'task',
		    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
	    ]);

	    DB::table('ticket_types')->insert([
		    'title' => 'bug',
		    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
		    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
	    ]);

        DB::table('projects')->insert([
            'title' => 'Testprojekt 1',
            'user_id' => 1,
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);

        DB::table('projects')->insert([
            'title' => 'Testprojekt 2',
            'user_id' => 1,
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);
    }
}
