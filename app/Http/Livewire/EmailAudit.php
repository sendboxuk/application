<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use DB;
class EmailAudit extends Component
{
    use WithPagination;
    
    public $emailterm = null;
    public $transidterm = null;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $emailterm = null;
        if (strlen($this->emailterm) > 2){
            $emailterm = $this->emailterm;
        }

        $transidterm = null;
        if (strlen($this->transidterm) > 2){
            $transidterm = $this->transidterm;
        }        
        
        $results = DB::table('email_audits')
                    ->where('to', 'like', '%'. $emailterm .'%')
                    ->where('transaction_id', 'like', '%'. $transidterm .'%')
                    ->orderBy('created_at', 'desc')->paginate();

        return view('livewire.email-audit', [
            'audits' => $results
        ]);

    }
}
