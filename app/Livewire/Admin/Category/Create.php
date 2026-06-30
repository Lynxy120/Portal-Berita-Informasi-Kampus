<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $slug;

    protected $rules = [
        'name' => 'required|string|max:50|unique:categories,name',
        'slug' => 'required|string|max:50|unique:categories,slug|regex:/^[a-z0-9-]+$/',
    ];

    public function updatedName($value)
    {
        $this->slug = \Str::slug($value);
    }

    public function save()
    {
        $this->validate();

        Category::create([
            'name' => $this->name,
            'slug' => $this->slug,
        ]);

        session()->flash('message', 'Kategori berhasil ditambahkan.');
        return $this->redirectRoute('admin.categories.index');
    }

    public function render()
    {
        return view('livewire.admin.category.create');
    }
}
