<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App;
use Socialite;
use Config;
use Log;
use App\User;
use App\SocialUser;
use Auth;

class SocialController extends Controller
{
    public function getSocialRedirect($provider){
        $providerKey = Config::get('services.' . $provider);
        if(empty($providerKey)){
            return App::abort(404);
        }
        return Socialite::driver($provider)->redirect();
    }

    public function getSocialCallback($provider,Request $request){
        if($request->exists('error')){
            return redirect()->route('login')
                    ->withErrors(['msg'=>$provider . '登入失敗']);
        }
        $socialite_user = Socialite::with($provider)->stateless()->user();
        $login_user = null;
        $user = User::where('email','=',$socialite_user->email)
                ->where('provider','=',$provider)->first();
        if(!empty($user)){
            $login_user = $user;
        }else{
            $newUser = new User([
                'email' => $socialite_user->email,
                'name' => $socialite_user->name,
                'avatar' => $socialite_user->avatar
            ]);
            $newUser->provider = $provider;
            $newUser->save();
            $new_socialUser = new SocialUser([
                'user_id' => $newUser->id,
                'provider_user_id' => $socialite_user->id,
                'provider' => $provider
            ]);
            $new_socialUser->save();
            $login_user = $newUser;
        }
        if(!is_null($login_user)){
            Auth::login($login_user);
            return redirect()->action('HomeController@index');
        }
        return App::abort(500);
    }
}
