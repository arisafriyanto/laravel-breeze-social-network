<?php

namespace App\Traits;

use App\Models\User;


trait Following
{

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id')->withTimestamps();
    }

    public function hasFollow(User $user)
    {
        //? true or false
        return $this->follows()->where('following_user_id', $user->id)->exists();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_user_id',  'user_id')->withTimestamps();
    }

    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function unfollow(User $user)
    {
        //? detach = menghapus pivot data ditable relasi many to many berdasarkan user, jika delete maka user akan unfollow semua atau hapus semua
        return $this->follows()->detach($user);
    }
}
