<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostMail;
use DB;
use App\Helpers\EmailHelper;

class AuditController extends Controller
{
    public function email_audits()
    {
        return view('panel.audits.email_audits');
    }

    public function api_audits()
    {
        return view('panel.audits.api_audits');
    }

    public function email_audit_view($id)
    {
        $email = DB::table('email_audits')->where('id', $id)->first();
        return view('panel.audits.email_audit_view', \compact('email'));
    }  

    public function api_audit_view($id)
    {
        $result = DB::table('api_audits')->where('id', $id)->first();
        $emails = DB::table('email_audits')->select('id', 'to', 'subject', 'transaction_id', 'created_at')->where('transaction_id', $result->transaction_id)->get();

        return view('panel.audits.api_audit_view', \compact('emails', 'result'));
    }      
    
    public function render_mail($id)
    {
        $email = DB::table('email_audits')->where('id', $id)->first();
        return view('panel.audits.render_mail', \compact('email'));
    }  

    public function resend($id)
    {
        $email = DB::table('api_audits')->where('id', $id)->first();
        $request = $email->request;
        $request = (array)(json_decode($request));
        $emailHelper = new EmailHelper();
        $request['placeholders'] = (array)$request['placeholders'];

        if (isset($request['sku'])){
            $emailHelper->createContentForProduct($request);
        }else{
            $emailHelper->createContentForTemplate($request);
        }

        Mail::to($request['email'])->queue(new PostMail($emailHelper));

        return redirect()->to("/api-audits/{$id}/view");
    }
}
