<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        $names = [
            'names' => [
                'Janzen Guzman',
                'Ariel Leonado',
                'Alexander Ramas'
            ]
        ];
        // return view('user.profile', ['user' => User::findOrFail($id)]);
        // return 'Hello World ' . $id;
        return view('greeting', $names);
    }
}
