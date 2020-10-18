<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use DB;
class EmailAudit extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.email-audit', [
            'audits' => DB::table('email_audits')->orderBy('created_at', 'desc')->paginate(10)
        ]);

    }
}
