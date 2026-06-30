<?php

namespace App\Livewire\Admin\Tag;

use App\Models\Tag;
use Livewire\Component;

class Edit extends Component
{
    public Tag $tag;
    public $name;
    public $slug;

    public function mount(Tag $tag)
    {
        $this->tag = $tag;
        $this->name = $tag->name;
        $this->slug = $tag->slug;
    }

    public function updatedName($value)
    {
        $this->slug = \Str::slug($value);
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:50|unique:tags,name,' . $this->tag->id,
            'slug' => 'required|string|max:50|unique:tags,slug,' . $this->tag->id . '|regex:/^[a-z0-9-]+$/',
        ]);

        $this->tag->update(['name' => $this->name, 'slug' => $this->slug]);
        session()->flash('message', 'Tag berhasil diperbarui.');
        return $this->redirectRoute('admin.tags.index');
    }

    public function render()
    {
        return view('livewire.admin.tag.edit');
    }
}
