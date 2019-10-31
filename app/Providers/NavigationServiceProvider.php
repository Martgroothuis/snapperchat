<?php

namespace App\Providers;
use App\User;
use App\Friend;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;

class NavigationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view){

//          $users = User::all()->whereNotIn('id', Auth::id());

            $users = User::whereDoesntHave('friends', function (Builder $query) {
                $query
                    ->where('friend_id', '=', Auth::id())
                    ->where('accepted', '=', true);
            })->get()->whereNotIn('id', Auth::id());

            return $view->with('users', $users);

        });

        view()->composer('*', function($view){

            $friendsRequests = Friend::where('friend_id', '=', [Auth::id()])->where('accepted', '=', 0)->latest()->get();

            return $view->with('friendsRequests', $friendsRequests);

        });

        view()->composer('*', function($view){

            $friends = Friend::where('friend_id', '=', [Auth::id()])->where('accepted', '=', 1)->latest()->get();

            return $view->with('friends', $friends);

        });
    }
}
