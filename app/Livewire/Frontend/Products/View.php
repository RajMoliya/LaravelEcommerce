<?php

namespace App\Livewire\Frontend\Products;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category,$product, $productColorSelectedQuantity , $productColorId;

    public function colorSelected($productColorId){
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors->where("id",$productColorId)->first();
        $this->productColorSelectedQuantity = $productColor->quantity;
        if($this->productColorSelectedQuantity== 0){
            $this->productColorSelectedQuantity = 'outOfStock';
        }
    }

    // add to cart
    public function addToCart(int $productId)
    {
        if (Auth::check()) {
            //dd( $productId);

             if ($this->product->where('id', $productId)->where('status','0')->exists()) {

                if($this->product->productColors()->count() > 1){

                    if($this->productColorSelectedQuantity != NULL){

                        if(Cart::where('user_id',auth()->user()->id)
                                        ->where('product_id',$productId)
                                        ->where('product_color_id',$this->productColorId)
                                        ->exists()){
                            $this->dispatch(
                                'message',
                                text: 'Product Already Added',
                                type: 'warning',
                                status: 401
                            );

                        }
                        else{
                            $productColor = $this->product->productColors()->where('id',$this->productColorId)->first();
                            if($productColor->quantity > 0){
                                    if($this->product->quantity > $this->quantityCount){
                                        //Insert Into Cart
                                        // dd('Added With Color');
                                        Cart::create([
                                            'user_id' => auth()->user()->id,
                                            'product_id' => $productId,
                                            'product_color_id' => $this->productColorId,
                                            'quantity' => $this->quantityCount,
                                        ]);
                                        $this->dispatch('CartAddedUpdated');
                                        $this->dispatch(
                                            'message',
                                            text: 'Product Added To Cart',
                                            type: 'success',
                                            status: 200
                                        );
                                    }
                                    else
                                    {
                                        $this->dispatch(
                                        'message',
                                        text: 'Only'.$productColor->quantity.'Quantity Available',
                                        type: 'warning',
                                        status: 404
                                        );
                                    }
                            }
                            else{
                                $this->dispatch(
                                    'message',
                                    text: 'Out Of Stock',
                                    type: 'warning',
                                    status: 404
                                );
                            }
                        }
                    }
                    else
                    {
                        $this->dispatch(
                            'message',
                            text: 'Select Color',
                            type: 'info',
                            status: 404
                        );
                    }
                }
                else // this is for without color  if product don't have multiple color
                {
                    if(Cart::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists()){
                        $this->dispatch(
                            'message',
                            text: 'Product Already Added',
                            type: 'warning',
                            status: 401
                        );
                    }
                    else{
                        if($this->product->quantity > 0){

                            if($this->product->quantity >= $this->quantityCount){
                                    // dd('Added Without Color');
                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'quantity' => $this->quantityCount,
                                    ]);
                                    $this->dispatch('CartAddedUpdated');
                                    $this->dispatch(
                                        'message',
                                        text: 'Product Added To Cart ',
                                        type: 'success',
                                        status: 200
                                    );
                            }
                            else
                            {
                                $this->dispatch(
                                'message',
                                text: 'Only'.$this->product->quantity.'Quantity Available',
                                type: 'warning',
                                status: 404
                                );
                            }
                        }
                        else
                        {
                                $this->dispatch(
                                    'message',
                                    text: 'Out Of Stock',
                                    type: 'warning',
                                    status: 404
                                );
                        }
                    }
                }
            }
             else
            {
                $this->dispatch(
                    'message',
                    text: 'Product Is Not Available',
                    type: 'warning',
                    status: 404
                );
            }
        }
        else
        {
            $this->dispatch('message',
                text: 'Please Login to continue',
                type: 'info',
                status : 401
            );
            return false;
        }
    }

    public function addToWishlist($productId){
        if(Auth::check()){
            if(Wishlist::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists()){
                $this->dispatch('message',
                    text : 'Already added to Wishlist...',
                    type : 'warning',
                    status : 409
                    );
            }
            else{
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                $this->dispatch('wishlistUpdated');
                $this->dispatch('message',
                    text : 'Added to Wishlist Successfully...',
                    type : 'success',
                    status : 200
                    );
            }

       }
       else{
        session()->flash('message','Please LogIn to Continue...');
        $this->dispatch('message',
            text : 'Please LogIn to Continue...',
            type : 'warning',
            status : 404
            );
        return false;
       }
    }

    // view Purchase Counter
    public $quantityCount = 1;
    public function incrementQuantity(){
        if($this->quantityCount<10){
        $this->quantityCount++;}
    }


    public function decrementQuantity(){
        if($this->quantityCount>1){
        $this->quantityCount--;}
    }


    public function mount($category,$product){
        $this->category = $category;
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.frontend.products.view',[
            'category' => $this->category,
            'product' => $this->product
        ]
    );
    }
}
