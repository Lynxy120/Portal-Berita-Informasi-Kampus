<?php

namespace App\Livewire\Admin\Tag;

use App\Models\Tag;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $slug;

    protected $rules = [
        'name' => 'required|string|max:50|unique:tags,name',
        'slug' => 'required|string|max:50|unique:tags,slug|regex:/^[a-z0-9-]+$/',
    ];

    public function updatedName($value)
    {
        $this->slug = \Str::slug($value);
    }

    public function save()
    {
        $this->validate();
        Tag::create(['name' => $this->name, 'slug' => $this->slug]);
        session()->flash('message', 'Tag berhasil ditambahkan.');
        return $this->redirectRoute('admin.tags.index');
    }

    public function render()
    {
        return view('livewire.admin.tag.create');
    }
}
