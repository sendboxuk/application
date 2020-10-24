<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Auth;

class ProfileController extends Controller
{
    /**
     * Show the application dashboard.
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit()
    {
        $user = Auth::user();
        return view('panel.profile.edit', \compact('user'));
    }
    
    public function update(ProfileRequest $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password){
            $user->password = bcrypt($request->password);
        }
        $user->save();        
        return redirect(route('profile.edit'))->with('success', trans('Your profile has been updated!'));
    }    
}
