<?php

namespace App\Livewire\Frontend\Wishlist;

use Livewire\Component;
use App\Models\Wishlist;

class Show extends Component
{

    public function removeWishlistItem(int $wishlistId){
        Wishlist::where('user_id',auth()->user()->id)->where('id',$wishlistId)->delete();
        $this->dispatch('wishlistUpdated');
        $this->dispatch('message',
                    text : 'Item Removed Successfully...',
                    type : 'success',
                    status : 200
                    );
    }
    public function render()
    {
        $wishlist = Wishlist::where('user_id',auth()->user()->id)->get();
        return view('livewire.frontend.wishlist.show',[
            'wishlist' => $wishlist
        ]);
    }
}
