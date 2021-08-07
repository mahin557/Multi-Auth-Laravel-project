<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function logout(){
        Auth::logout();

        return redirect()->route('login');
    }

    public function profile(){
           $id= Auth::user()->id;
           $user = User::find($id);
           return view('user.profile.view_profile',compact('user'));

    }
    public function userprofileedit(){
        $id= Auth::user()->id;
        $editdata=User::find($id);
        return view('user.profile.view_profile_edit',compact('editdata'));
    }
    public function userprofilestore(Request $req){
        $data=User::find(Auth::user()->id);
        $data->name = $req->name;
        $data->email = $req->email;

        if($req->file('profile_photo_path'))
        {
            $file=$req->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $filename= date('YmHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['profile_photo_path']=$filename;
        }
        $data->save();

        $notification = array(
            'message'=> 'User Profile Updated Successfully',
            'alert-type' =>'success'

        );
        return Redirect()->route('dashboard')->with($notification);
    }
    public function userpasswordview(){
        return view('user.password.edit_password');
    }
    public function userpasswordupdate(Request $req){
     $validate = $req->validate([
         'oldpassword' => 'required',
         'password'    =>  'required|confirmed',
     ]);

     $hashedpassword = Auth::user()->password;
     if(Hash::check($req->oldpassword,$hashedpassword)){
         $user = User::find(Auth::user()->id);
         $user -> password = Hash::make($req->password);
         $user->save();
         Auth::logout();
         return redirect()->route('login');
     }
     else{
         return redirect()->back();
     }
    }
}
