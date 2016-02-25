<?php

namespace App;

use App\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	/**
	 * Get all tickets of the user.
	 */
	public function tickets()
	{
		return $this->hasMany(Ticket::class);
	}

	/**
	 * Get all projects of the user.
	 */
	public function projects()
	{
		return $this->hasMany(Project::class);
	}

    /**
     * Gets role assigned to user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role()
    {
        return $this->hasOne(Role::class);
    }
}
