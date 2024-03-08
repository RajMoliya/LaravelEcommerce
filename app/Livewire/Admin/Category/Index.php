<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\AttributeWithPagination;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.category.index', ['categories' => $categories]);
    }

    public $c_id;
    public function deleteCategory($c_id)
    {
        $this->c_id = $c_id;
    }

    public function destroyCategory()
    {
        $c = Category::find($this->c_id);
        $path = 'uploads/category/' . $c->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $c->delete();
        session()->flash('message', 'Deleted Successfully');
    }
}
