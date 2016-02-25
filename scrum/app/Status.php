<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
	// overwrites Eloquent default snake case
	protected $table = 'status';
}
