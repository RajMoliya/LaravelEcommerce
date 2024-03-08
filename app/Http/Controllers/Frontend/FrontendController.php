<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index(){
        $sliders = Slider::where('status','0')->get();
        $trendingProducts = Product::where('trending','1')->latest()->take(12)->get();
        $newArrivalsProducts = Product::latest()->take(12)->get();
        $featuredProducts = Product::where('featured','1')->latest()->take(12)->get();
        return view("frontend.index",compact('sliders','trendingProducts','newArrivalsProducts','featuredProducts'));
    }

    public function categories(){
        $categories = Category::where('status','0')->get();
        return view('frontend.collections.category.index',compact('categories'));
    }

    public function products($category_slug){
        $category = Category::where('slug',$category_slug)->firstOrFail();
        if($category){
            return view('frontend.collections.products.index',compact('category'));
        }
        else{return redirect()->back();}
    }

    public function productView(string $category_slug,string $product_slug){
        $category = Category::where('slug',$category_slug)->firstOrFail();
        if($category){

            $product = $category->products()->where('slug',$product_slug)->where('status','0')->first();
            if($product){
            return view('frontend.collections.products.view',compact('product','category'));
            }
        }
        else{return redirect()->back();}
    }

    public function thankyou(){
        return view('frontend.thankyou');
    }

    public function newArrivals(){
        $newArrivalsProducts = Product::latest()->take(16)->get();
        return view('frontend.pages.new-arrivals',compact('newArrivalsProducts'));
    }

    public function featured(){
        $featuredProducts = Product::where('featured','1')->latest()->get();
        return view('frontend.pages.featured',compact('featuredProducts'));
    }
}