<?php

namespace App\Livewire\Frontend\Wishlist;

use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class Count extends Component
{
    public $wishlistCount;

    // wishlistAdded
    protected $listeners = ['wishlistUpdated' => 'checkWishlistCount'];
    public function checkWishlistCount(){
        if(Auth::check()){
            return $this->wishlistCount = Wishlist::where("user_id",auth()->user()->id)->count();
        }
        else{
            return $this->wishlistCount = 0;
        }
    }

    public function render()
    {
        $this->wishlistCount = $this->checkWishlistCount();
        return view('livewire.frontend.wishlist.count',[
            'wishlistCount' => $this->wishlistCount,
        ]);
    }
}
