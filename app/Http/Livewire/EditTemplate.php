<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Template;

class EditTemplate extends Component
{
    public $name;
    public $filename;
    public $subject;
    public $template_id;
    public $placeholders;
    public $sensitive_placeholders;

    public function mount($template)
    {
        $this->template_id = $template->id;
        $this->name = $template->name;
        $this->filename = $template->filename;
        $this->subject = $template->subject;
        $this->placeholders = $template->placeholders;
        $this->sensitive_placeholders = $template->sensitive_placeholders;
    }

    protected $rules = [
        'name' => 'required|min:6',
        'filename' => 'required|min:3',
        'subject' => 'required|min:3',
    ];

    public function editTemplate()
    {
        $this->validate();
 
        $template = Template::find($this->template_id);
        $template->update(
            [
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
        return view('livewire.edit-template');
    }
}
