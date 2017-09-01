<?php

/*
 * This file is part of the overtrue/laravel-follow
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Laravelme\Acquaintances\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FriendFriendshipGroups
 * @package Laravelme\Acquaintances\Models
 */
class FriendFriendshipGroups extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['friendship_id', 'group_id', 'friend_id', 'friend_type'];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->table = config('acquaintance.tables.friendship_groups');

        parent::__construct($attributes);
    }

}
