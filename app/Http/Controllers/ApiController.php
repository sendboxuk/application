<?php

namespace App\Http\Controllers;

use App\Mail\PostMail;
use App\Models\Product;
use App\Models\Template;
use Illuminate\Http\Request;
use App\Helpers\EmailHelper;
use Illuminate\Support\Facades\Mail;

class ApiController extends Controller
{

    public function sendby_template(Request $request)
    {
        $email = new EmailHelper();
        $email->createContentForTemplate($request);
        Mail::to($request['email'])->queue(new PostMail($email));
        return response()->json(['message' => 'The email saved to queue'], 201);
    }

    public function sendby_product(Request $request)
    {
        $email = new EmailHelper();
        $email->createContentForProduct($request);
        Mail::to($request['email'])->queue(new PostMail($email));
        return response()->json(['message' => 'The email saved to queue'], 201); 
    }
}
