<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;

// use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index(){
        $colors = Color::all();
        return view("admin.colors.index",compact("colors"));
    }

    public function create(){
        return view("admin.colors.create");
    }

    public function store(ColorFormRequest $request){
        $validatedData = $request->validated();
        $validatedData['status'] = $request->status == true ? '1' :'0';
        $color = Color::create($validatedData);

        return redirect('admin/colors')->with("message","Color Added Successfully...");
    }

    public function edit(int $color_id){
        $color = Color::findOrFail($color_id);
        return view("admin.colors.edit",compact("color"));
    }

    public function update(ColorFormRequest $request, int $color_id){

        $validatedData = $request->validated();
        $validatedData['status'] = $request->status == true ? '1' :'0';
        Color::find($color_id)->update($validatedData);

        return redirect('admin/colors')->with('message','Color Updated Successfully...');
    }

    public function destroy(int $color_id){
        $color = Color::findOrFail($color_id);
        $color->delete();
        return redirect('admin/colors')->with('message','Color Deleted Successfully...');
    }

}
