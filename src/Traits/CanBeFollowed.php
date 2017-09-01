<?php

/*
 * This file is part of the overtrue/laravel-follow
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Laravelme\Acquaintances\Traits;

use Laravelme\Acquaintances\Follow;


/**
 * Trait CanBeFollowed.
 */
trait CanBeFollowed
{
    /**
     * Check if user is followed by given user.
     *
     * @param int $user
     *
     * @return bool
     */
    public function isFollowedBy($user)
    {
        return Follow::isRelationExists($this, 'followers', $user);
    }

    /**
     * Return followers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers()
    {
        return $this->morphToMany(config('acquaintance.user_model'), config('acquaintance.morph_prefix'),
            config('acquaintance.tables.followships'))
                    ->wherePivot('relation', '=', Follow::RELATION_FOLLOW)
                    ->withPivot('followable_type', 'relation', 'created_at');
    }
}
