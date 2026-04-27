<?php


use Illuminate\Support\Facades\Auth;

if (! function_exists('user')) {
    /**
     * @param  ?string  $key
     * @return Authenticatable|User|mixed
     */
    function user($key = null)
    {
        $user = Auth::user();

        return $key ? $user?->{$key} : $user;
    }
}

if (! function_exists('get_full_name')) {

    function get_full_name()
    {
        return user()?->first_name.' '.user()?->last_name;
    }
}
