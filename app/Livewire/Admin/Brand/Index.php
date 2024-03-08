<?php

namespace App\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
// use GuzzleHttp\Psr7\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithPagination;
// use Illuminate\Support\Facades\Event;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $slug, $status ,$brand_id,$category_id;


    public function rules()
    {
        return [
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'nullable',
            'category_id' => 'required|integer'
        ];
    }



    public function storeBrand()
    {
        $validatedData = $this->validate();
        Brand::create([
            'name'=> $this->name,
            'slug'=> Str::slug($this->slug),
            'status'=> $this->status == true ? '1':'0',
            'category_id'=>$this->category_id
        ]);
        session()->flash('message','Added Successfully');
        $this->dispatch('close-modal');
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->name = NULL;
        $this->slug = NULL;
        $this->status = NULL;
        $this->brand_id = NULL;
        $this->category_id = NULL;
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function render()
    {
        $categories = Category::where('status','0')->get();
        $brand = Brand::orderBy('id', 'DESC')->paginate(3);
        return view('livewire.admin.brand.index', ['brands' => $brand,'categories'=> $categories])
        ->extends('layouts.admin')
        ->section('content');
    }

    public function editBrand($b_id){
        $this->brand_id = $b_id;
        $brand = Brand::findOrFail($b_id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status == '1' ? true : false;
        $this->category_id = $brand->category_id;
    }


    public function updateBrand(){
        $validatedData = $this->validate();
        Brand::findOrFail($this->brand_id)->update([
            'name'=> $this->name,
            'slug'=> Str::slug($this->slug),
            'status'=> $this->status == true ? '1':'0',
            'category_id'=>$this->category_id
        ]);
        session()->flash('message','Updated Successfully');
        $this->dispatch('close-modal');
        $this->resetInput();
    }

    public function deleteBrand($b_id){
        $this->brand_id = $b_id;
    }

    public function destroyBrand(){
        Brand::findOrFail($this->brand_id)->delete();
        session()->flash('message','Deleted Successfully');
        $this->resetInput();
    }

}
