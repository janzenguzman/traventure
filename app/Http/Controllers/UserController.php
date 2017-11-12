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
    public function show($id)
    {
        $list = [
            'names' => [
                'Janzen Guzman',
                'Leo Tan'
            ]
        ];
        // return view('user.profile', ['user' => User::findOrFail($id)]);
        // return 'Hello World ' . $id;
        return view('greeting', $list);
    }
}