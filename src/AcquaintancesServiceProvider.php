<?php

/*
 * This file is part of the overtrue/laravel-follow
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Laravelme\Acquaintances;

use Illuminate\Support\ServiceProvider;

class AcquaintancesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $root = dirname(__DIR__);

        if ( ! file_exists(config_path('acquaintance.php'))) {
            $this->publishes([
                $root . '/config/acquaintance.php' => config_path('acquaintance.php'),
            ], 'config');
        }

        if ( ! class_exists('CreateLaravelFollowshipsTable')) {
            $datePrefix = date('Y_m_d_His');
            $this->publishes([
                $root . '/database/migrations/create_laravel_followships_table.php' => database_path("/migrations/{$datePrefix}_create_laravel_followships_table.php"),
            ], 'migrations');
        }

        if ( ! class_exists('CreateLaravelFriendshipTable')) {
            $datePrefix = date('Y_m_d_His');
            $this->publishes([
                $root . '/database/migrations/create_laravel_friendship_table.php' => database_path("/migrations/{$datePrefix}_create_laravel_friendship_table.php"),
            ], 'migrations');
        }

        if ( ! class_exists('CreateLaravelFriendshipsGroupsTable')) {
            $datePrefix = date('Y_m_d_His');
            $this->publishes([
                $root . '/database/migrations/create_laravel_friendships_groups_table.php' => database_path("/migrations/{$datePrefix}_create_laravel_friendships_groups_table.php"),
            ], 'migrations');
        }

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(dirname(__DIR__) . '/config/acquaintance.php', 'acquaintance');
    }
}
