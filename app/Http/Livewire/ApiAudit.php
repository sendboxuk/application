<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use DB;

class ApiAudit extends Component
{
    use WithPagination;
    
    public $transidterm = null;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $transidterm = null;
        if (strlen($this->transidterm) > 2){
            $transidterm = $this->transidterm;
        }        
        
        $results = DB::table('api_audits')
                    ->where('transaction_id', 'like', $transidterm .'%')
                    ->orderBy('created_at', 'desc')->paginate();

        return view('livewire.api-audit', [
            'audits' => $results
        ]);

    }
}
