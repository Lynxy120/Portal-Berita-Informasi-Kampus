<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = ['search'];

    public function render()
    {
        $categories = Category::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('slug', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.admin.category.index', [
            'categories' => $categories,
        ]);
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        // Cek apakah category masih dipakai di artikel (optional)
        // if ($category->articles()->count() > 0) { ... }
        $category->delete();
        session()->flash('message', 'Kategori berhasil dihapus.');
        return $this->redirectRoute('admin.categories.index');
    }
}
