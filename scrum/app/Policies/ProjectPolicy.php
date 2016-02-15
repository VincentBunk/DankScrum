<?php

namespace App\Policies;

use App\User;
use App\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

	/**
	 * Determine if the given user can delete the given project.
	 *
	 * @param  User  $user
	 * @param  Project  $project
	 * @return bool
	 */
	public function delete(User $user, Project $project)
	{
		return $user->id === $project->user_id;
	}

	/**
	 * Determine if the given user can update the given project.
	 *
	 * @param  User  $user
	 * @param  Project  $project
	 * @return bool
	 */
	public function update(User $user, Project $project)
	{
		return $user->id === $project->user_id;
	}

    /**
     * Determine if the given user can edit the given project.
     *
     * @param  User  $user
     * @param  Project  $project
     * @return bool
     */
    public function edit(User $user, Project $project)
    {
        return $user->id === $project->user_id;
    }
}
