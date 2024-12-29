<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class SellerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function isSeller(User $user): bool
    {
        // return auth()->user()->is_seller;
        // dd($user);
        return $user->is_seller;
    }
}
