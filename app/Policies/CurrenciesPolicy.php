<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CurrenciesPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return $user->getAttribute('is_admin');
    }
    
    public function update(User $user)
    {
        return $user->getAttribute('is_admin');
    }
   
    public function delete(User $user)
    {
        return $user->getAttribute('is_admin');
    }
}
