<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Template;

class CreateTemplate extends Component
{
    public $name;
    public $filename;
    public $subject;
    public $placeholders;
    public $sensitive_placeholders;

    protected $rules = [
        'name' => 'required|min:6',
        'filename' => 'required|min:3',
        'subject' => 'required|min:3',
    ];

    public function createTemplate()
    {
        $this->validate();

        // Execution doesn't reach here if validation fails.

        Template::create([
            'name' => $this->name,
            'filename' => $this->filename,
            'subject' => $this->subject,
            'placeholders' => $this->placeholders,
            'sensitive_placeholders' => $this->sensitive_placeholders
        ]);
        return redirect()->to('/templates');
    }

    public function render()
    {
        return view('livewire.create-template');
    }
}
