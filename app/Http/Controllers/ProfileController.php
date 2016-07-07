<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display user's profile
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
//        return view('profile.index', [
//            'tasks' => $this->tasks->forUser($request->user()),
//        ]);
//        return view('profile.index',['user' => $request->user()]);
        return view('profile.index', array('user' => $request->user()) );
    }

    /**
     * Edit user's profile
     *
     * @param  Request  $request
     * @return Response
     */
    public function edit(Request $request)
    {
        return view('profile.edit', array('user' => $request->user()));
    }

    /**
     * Update user's profile
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // Validate the form with specified rules
        $this->validate($request, [
            'height' => 'integer|min:0',
            'weight' => 'integer|min:0',
            'units' => 'required',
            'dob' => 'required',
            'dob_format' => 'required',
        ]);

        // Save user's new profile settings
        $profile = $request->user()->profile;
        $profile->height = $request->height;
        $profile->weight = $request->weight;
        $profile->units = $request->units;
        $profile->dob = $request->dob;
        $profile->dob_format = $request->dob_format;
        $profile->save();

        return redirect('/profile/edit');
    }
}
