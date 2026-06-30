<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class Edit extends Component
{
    public Category $category;
    public $name;
    public $slug;

    protected $rules = [
        'name' => 'required|string|max:50|unique:categories,name,{category}',
        'slug' => 'required|string|max:50|unique:categories,slug,{category}|regex:/^[a-z0-9-]+$/',
    ];

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->name = $category->name;
        $this->slug = $category->slug;
    }

    public function updatedName($value)
    {
        $this->slug = \Str::slug($value);
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:50|unique:categories,name,' . $this->category->id,
            'slug' => 'required|string|max:50|unique:categories,slug,' . $this->category->id . '|regex:/^[a-z0-9-]+$/',
        ]);

        $this->category->update([
            'name' => $this->name,
            'slug' => $this->slug,
        ]);

        session()->flash('message', 'Kategori berhasil diperbarui.');
        return $this->redirectRoute('admin.categories.index');
    }

    public function render()
    {
        return view('livewire.admin.category.edit');
    }
}
