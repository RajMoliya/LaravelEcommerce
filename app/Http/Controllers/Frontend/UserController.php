<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view("frontend.user.profile");
    }

    public function updateUserDetails(Request $request){

        $request->validate([
            'name' => ['string','required'],
            'phone' => ['digits:10','required'],
            'pin_code' => ['digits:6','required'],
            'address' => ['string','required','max:400']
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $user->update([
            'name' => $request->name,
        ]);
        $user->userDetail()->updateOrCreate(
            [
                'user_id' => $user->id
            ],
            [
                'phone' => $request->phone,
                'pin_code'=> $request->pin_code,
                'address'=> $request->address,
            ]
    );
    return redirect()->back()->with('message','User Profile Updated Successfully');
    }

    public function passChange(){
        return view('frontend.user.change-password');
    }

    public function updatePass(Request $request){
        $request->validate([
            'current_password' => ['required','string','min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);
        if($currentPasswordStatus){

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('message','Password Updated Successfully');

        }else{

            return redirect()->back()->with('message','Current Password does not match with Old Password');
        }
    }
}
