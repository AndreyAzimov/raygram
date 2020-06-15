<?php

namespace App\Policies;

use App\Profile;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }


    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Profile $profile
     * @return mixed
     */


    public function viewPrivateProfile(?User $user, Profile $profile)
    {
        if (optional($user)->id === $profile->user->id) {
            return true;
        }

        if (!optional($user)->following($profile->user)) {
            if ($profile->private_profile) {
                return false;
            }
        }

        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Profile $profile
     * @return mixed
     */
    public function update(User $user, Profile $profile)
    {
        return $user->id == $profile->user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Profile $profile
     * @return mixed
     */
    public function delete(User $user, Profile $profile)
    {
        return $user->id == $profile->user->id;
    }
}
