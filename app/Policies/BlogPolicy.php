<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Blog;

class BlogPolicy
{
    use HandlesAuthorization;

    public function blog_edit(User $user, Blog $blog){
        return $user->id === $blog->user_id;
    }
}
