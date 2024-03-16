<?php

namespace App\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\Orderitem;
use Illuminate\Support\Str;
use App\Mail\PlaceOrderMailable;
use Illuminate\Support\Facades\Mail;

class CheckoutShow extends Component
{

    public $carts ,$totalProductAmount = 0;

    public $fullname,$email,$phone,$address, $pincode,$payment_mode = NULL,$payment_id = NULL;

    public function rules(){
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|string|min:10|max:11',
            'pincode' => 'required|string|min:6|max:6',
            'address' => 'required|string|max:500',

        ] ;
    }



    public function placeOrder(){
        $this->validate();

        $order = Order::create([
        'user_id' => auth()->user()->id,
        'tracking_no' => 'ecom'.Str::random(10),
        'fullname' => $this->fullname,
        'email' => $this->email,
        'phone' => $this->phone,
        'address' => $this->address,
        'pincode' => $this->pincode,
        'status_message' => 'in progress',
        'payment_mode' => $this->payment_mode,
        'payment_id' => $this->payment_id
        ]);

        foreach($this->carts as $cartItem){
            Orderitem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product->id ,
                'product_color_id' => $cartItem->prod_color_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->selling_price
            ]);

            if($cartItem->product_color_id != NULL){
                $cartItem->productColor()->where('id',$cartItem->product_color_id)->decrement('quantity',$cartItem->quantity);
            }
            else{
                $cartItem->product()->where('id',$cartItem->product_id)->decrement('quantity',$cartItem->quantity);
            }
        }

        return $order;


    }
    public function codOrder(){
        $this->payment_mode = "Cash on Delivery";
        $codOrder = $this->placeOrder();
        if($codOrder){

            Cart::where('user_id',auth()->user()->id)->delete();

            try{
                $order = Order::findOrFail($codOrder->id);
                Mail::to("$order->email")->send(new PlaceOrderMailable($order));
            }
            catch(\Exception $e){
                dd('Error');
                // return redirect()->back()->with('message','Something went Wrong');
            }


            $this->dispatch(
                'message',
                text: 'Order Placed Successfully',
                type: 'success',
                status: 200
            );
            return redirect()->to('thank-you');
        }
        else{
            $this->dispatch(
                'message',
                text: 'Something went Wrong',
                type: 'error',
                status: 500
            );
        }

        }

    public function totalProductAmount(){
        $this->totalProductAmount = 0;
        $this->carts = Cart::where('user_id',auth()->user()->id)->get();
        foreach($this->carts as $cartItem){
            $this->totalProductAmount += $cartItem -> product->selling_price * $cartItem->quantity;
        }
        return $this->totalProductAmount;
    }
    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->phone = auth()->user()->userDetail->phone;
        $this->pincode = auth()->user()->userDetail->pin_code;
        $this->address = auth()->user()->userDetail->address;
        $this->totalProductAmount = $this->totalProductAmount();
        return view('livewire.frontend.checkout.checkout-show',[
            'totalProductAmount'=> $this->totalProductAmount,
        ]);
    }
}
