<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Template;

class ShowTemplates extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.show-templates', [
            'templates' => Template::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }
}
