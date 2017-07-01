<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use File;
use App\Http\Requests\UserAvatarRequest;
use Log;

use \Carbon\Carbon as Carbon;

class UserController extends Controller
{
    public function getAvatar(){
        return view('user.avatar');
    }

    public function postAvatar(UserAvatarRequest $request){
        if(!$request->hasFile('avatar')){
            return redirect()->route('post.index');
        }
        $file = $request->file('avatar');
        $destinationPath = 'upload/avatar';
        if(!file_exists(public_path() . '/' . $destinationPath)){
            File::makeDirectory(public_path() . '/' . $destinationPath,0755,true);
        }
        $extension = $file->getOriginalExtension();
        $fileName = (Carbon::now()->timestamp).'.'.$extension;
        // file move to location 
        $file->move(public_path() .'/'.$destinationPath,$fileName);
        $user = Auth::user();
        $user->avatar = $destinationPath .'/'.$fileName;
        $user->save();
        Log::info('upload user avatar success');
        return redirect()->route('post.index');
    }
}
