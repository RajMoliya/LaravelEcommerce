<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
}
