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

    if (! function_exists('get_initials')) {
        function get_initials($name, $limit = 2)
        {
          $words = explode(' ', trim($name));
          $initials = '';

          foreach ($words as $word)
          {
                if ($limit > 0 && ! empty($word)) {
                    $initials .= strtoupper(substr($word, 0, 1));
                    $limit--;
                }
          }
                return $initials ?: strtoupper(substr($word, 0, 1));
        }
    }
}
