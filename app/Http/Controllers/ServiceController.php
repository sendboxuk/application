<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        return view('panel.services.index');
    }

    public function create()
    {
        return view('panel.services.create');
    }

    public function edit(Service $service)
    {
        return view('panel.services.edit', \compact('service'));
    }    
 
    public function view(Service $service)
    {
        $template = $service->template;
        $json = [
            'template' => $template->id,
            'transaction_id' => 'YOUR TRANSACTION ID',
            'email' => $service->emails,
            'placeholders' => $template->sample_placeholders
        ];
        return view('panel.services.view', \compact('service', 'json'));
    }    

    public function send(Service $service)
    {
        return view('panel.services.send', \compact('service'));
    }
}
