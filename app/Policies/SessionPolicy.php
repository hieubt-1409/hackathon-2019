<?php

namespace App\Policies;

use App\Models\Session;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SessionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any sessions.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the session.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Session  $session
     * @return mixed
     */
    public function view(User $user, Session $session)
    {
        return true;
    }

    /**
     * Determine whether the user can create sessions.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the session.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Session  $session
     * @return mixed
     */
    public function update(User $user, Session $session)
    {
        return $user->id == $session->user_id;
    }

    /**
     * Determine whether the user can delete the session.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Session  $session
     * @return mixed
     */
    public function delete(User $user, Session $session)
    {
        return $user->id == $session->user_id;
    }

    /**
     * Determine whether the user can restore the session.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Session  $session
     * @return mixed
     */
    public function restore(User $user, Session $session)
    {
        return $user->id == $session->user_id;
    }

    /**
     * Determine whether the user can permanently delete the session.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Session  $session
     * @return mixed
     */
    public function forceDelete(User $user, Session $session)
    {
        return $user->id == $session->user_id;
    }
}
