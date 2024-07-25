<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class FacebookAuthController extends Controller
{
    public function redirect(){
        return Socialite::driver('facebook')->redirect();
        dd("a");
    }

    public function callBackFaceBook(){
        $user = Socialite::driver('facebook')->stateless()->user();
        $findUser = User::where('facebook_id',$user->id)->first();
        if($findUser){
            Auth::login($findUser);
            return redirect('/home');
        }else{
            $new_user = new User();
            $new_user->name = $user->name;
            $new_user->email = $user->email;
            //$new_user->facebook_id = $user->id;
            //$new_user->password = bcrypt('123456');
            $new_user->save();
            Auth::login($new_user);
            return redirect('/home');
        }
    }
}
