<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Service;
use App\Models\Template;

class CreateService extends Component
{
    public $name;
    public $emails;
    public $template_id;

    protected $rules = [
        'name' => 'required|min:6',
        'emails' => 'required',
        'template_id' => 'required'
    ];

    public function createService()
    {
        $this->validate();

        // Execution doesn't reach here if validation fails.

        Service::create([
            'name' => $this->name,
            'emails' => $this->emails,
            'template_id' => $this->template_id
        ]);
        return redirect()->to('/services');
    }

    public function render()
    {
        $templates = Template::all();
        return view('livewire.create-service', \compact('templates'));
    }
}
