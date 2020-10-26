<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MailDriver;
use Auth;

class SettingController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit()
    {
        $user = Auth::user();
        $drivers = MailDriver::all();

        $token = null;
        $token = $user->tokens()->orderBy('id', 'desc')->first();
        if ($token){
            $token = $token->plainTextToken;
        }

        return view('panel.settings.edit', \compact('drivers', 'token'));
    }
    
    public function update()
    {
        return redirect(route('settings.edit'))->with('success', trans('Your settings has been updated!'));
    }    

    public function regenerate_token()
    {
        $user = Auth::user();
        $user->tokens()->delete();
        $token = $user->createToken('api-access', ['sendmail'])->plainTextToken;

        return redirect(route('settings.edit'))
                        ->with('success', trans('Your API token has been updated!'))
                        ->with('session-token', $token);
    }
}