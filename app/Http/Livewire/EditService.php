<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Service;
use App\Models\Template;

class EditService extends Component
{
    public $name;
    public $emails;
    public $template_id;
    public $service_id;

    protected $rules = [
        'name' => 'required|min:6',
        'emails' => 'required',
        'template_id' => 'required',
        'service_id' => 'required'
    ];
    
    public function mount($service)
    {
        $this->service_id = $service->id;
        $this->name = $service->name;
        $this->emails = $service->emails;
        $this->template_id = $service->template_id;
    }

    public function editService()
    {
        $this->validate();

        // Execution doesn't reach here if validation fails.
        $service = Service::find($this->service_id);
        $service->update(
            [
            'name' => $this->name,
            'emails' => $this->emails,
            'template_id' => $this->template_id
        ]);


        //return redirect()->to('/services');
    }

    public function render()
    {
        $templates = Template::all();
        return view('livewire.edit-service', \compact('templates'));
    }
}
