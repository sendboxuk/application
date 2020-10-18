<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Mail;
use App\Mail\PostMail;
use DB;

class AuditController extends Controller
{
    public function email_audits()
    {
        return view('panel.audits.email_audits');
    }

    public function email_audit_view($id)
    {
        $email = DB::table('email_audits')->where('id', $id)->first();
        return view('panel.audits.email_audit_view', \compact('email'));
    }  
    
    public function render_mail($id)
    {
        $email = DB::table('email_audits')->where('id', $id)->first();
        return view('panel.audits.render_mail', \compact('email'));
    }  
}
