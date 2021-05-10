<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Service;

class ShowServices extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.show-services',[
            'services' => Service::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }
}
