<?php

namespace App\Livewire\Admin\Tag;

use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    protected $queryString = ['search'];

    public function render()
    {
        $tags = Tag::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('slug', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.admin.tag.index', ['tags' => $tags]);
    }

    public function delete($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        session()->flash('message', 'Tag berhasil dihapus.');
        return $this->redirectRoute('admin.tags.index');
    }
}
