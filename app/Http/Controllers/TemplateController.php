<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;

class TemplateController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('panel.templates.index');
    }
    
    public function create()
    {
        return view('panel.templates.create');
    }    

    public function edit(Template $template)
    {
        return view('panel.templates.edit', \compact('template'));
    }        

    public function view(Template $template)
    {
        $json = [
            'template' => $template->id,
            'transaction_id' => 'YOUR TRANSACTION ID',
            'email' => 'WHO WILL RECEIVE',
            'placeholders' => $template->sample_placeholders
        ];

        return view('panel.templates.view', \compact('template', 'json'));
    }

    public function send(Template $template)
    {
        return view('panel.templates.send', \compact('template'));
    }    
}
