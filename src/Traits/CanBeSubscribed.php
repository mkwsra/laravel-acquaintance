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
 * Trait CanBeSubscribed.
 */
trait CanBeSubscribed
{
    /**
     * Check if user is subscribed by given user.
     *
     * @param int $user
     *
     * @return bool
     */
    public function isSubscribedBy($user)
    {
        return Follow::isRelationExists($this, 'subscribers', $user);
    }

    /**
     * Return followers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subscribers()
    {
        return $this->morphToMany(config('acquaintance.user_model'), config('acquaintance.morph_prefix'),
            config('acquaintance.tables.followships'))
                    ->wherePivot('relation', '=', Follow::RELATION_SUBSCRIBE)
                    ->withPivot('followable_type', 'relation', 'created_at');
    }
}
