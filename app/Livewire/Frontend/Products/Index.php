<?php

namespace App\Livewire\Frontend\Products;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $products, $category,$brandsInput = [] ,$priceInput;

    protected $queryString = [
        "brandsInput"=> ['except' => '' , 'as' => 'brand'],
        "priceInput"=> ['except' => '' , 'as' => 'price'],
    ];

    public function mount($category){

        $this->category = $category;
    }
    public function render()
    {
        $this->products = Product::where('category_id',$this->category->id)
                            ->when($this->brandsInput,function ($q) {
                                $q->whereIn('brand',$this->brandsInput);
                            })
                            ->when($this->priceInput,function ($q) {

                                $q->when($this->priceInput == 'high-to-low',function($q2){
                                    $q2->orderBy('selling_price','DESC');
                                })
                                ->when($this->priceInput == 'low-to-high',function($q2){
                                    $q2->orderBy('selling_price','ASC');
                                });

                            })
                            ->where('status','0')
                            ->get();
        return view('livewire.frontend.products.index',[
            'products' => $this->products,
            'category'=> $this->category,
        ]);
    }
}
