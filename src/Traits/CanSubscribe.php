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
 * Trait CanSubscribe.
 */
trait CanSubscribe
{
    /**
     * Subscribe an item or items.
     *
     * @param int|array|\Illuminate\Database\Eloquent\Model $targets
     * @param string                                        $class
     *
     * @return array
     */
    public function subscribe($targets, $class = __CLASS__)
    {
        return Follow::attachRelations($this, 'subscriptions', $targets, $class);
    }

    /**
     * Unsubscribe an item or items.
     *
     * @param int|array|\Illuminate\Database\Eloquent\Model $targets
     * @param string                                        $class
     *
     * @return array
     */
    public function unsubscribe($targets, $class = __CLASS__)
    {
        return Follow::detachRelations($this, 'subscriptions', $targets, $class);
    }

    /**
     * Toggle subscribe an item or items.
     *
     * @param int|array|\Illuminate\Database\Eloquent\Model $targets
     * @param string                                        $class
     *
     * @return array
     */
    public function toggleSubscribe($targets, $class = __CLASS__)
    {
        return Follow::toggleRelations($this, 'subscriptions', $targets, $class);
    }

    /**
     * Check if user is subscribed given item.
     *
     * @param int|array|\Illuminate\Database\Eloquent\Model $target
     * @param string                                        $class
     *
     * @return bool
     */
    public function hasSubscribed($target, $class = __CLASS__)
    {
        return Follow::isRelationExists($this, 'subscriptions', $target, $class);
    }

    /**
     * Return user subscriptions.
     *
     * @param string $class
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subscriptions($class = __CLASS__)
    {
        return $this->morphedByMany($class, config('acquaintance.morph_prefix'),
            config('acquaintance.tables.followships'))
                    ->wherePivot('relation', '=', Follow::RELATION_SUBSCRIBE)
                    ->withPivot('followable_type', 'relation', 'created_at');
    }
}
