<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Template;
use App\Helpers\EmailHelper;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostMail;

class EmailHelperTest extends TestCase
{
    use RefreshDatabase;

    public function testDatabase()
    {
        $products = Product::factory()->count(10)->forTemplate()->make();  
        $this->assertTrue(true);
    }

    public function test_sendby_template_subject()
    {
        $template = Template::factory()->make();  
        
        $request = [
            'template' => $template->id,
            'transaction_id' => Str::random(10),
            'email' => 'hi@sendbox.uk',
            'placeholders' => [
                'customer_name' => 'John Doe',
                'product_name' => 'Lorem Ipsum'
            ]
        ];
        
        $emailHelper = new EmailHelper();
        $emailHelper->setTemplate($template);
        $emailHelper->createContentForTemplate($request);
        $this->assertEquals($emailHelper->getSubject(), $template->subject);
    }  

    public function test_sendby_product_subject()
    {
        $product = Product::factory()->forTemplate()->make();  
        
        $request = [
            'sku' => $product->sku,
            'transaction_id' => Str::random(10),
            'email' => 'hi@sendbox.uk',
            'placeholders' => [
                'customer_name' => 'John Doe',
                'product_name' => $product->name
            ]
        ];
        
        $emailHelper = new EmailHelper();
        $emailHelper->setProduct($product);
        $emailHelper->createContentForProduct($request);
        $this->assertEquals($emailHelper->getSubject(), $product->template->subject);
    }  

    public function test_sendby_product_transaction_id()
    {
        $product = Product::factory()->forTemplate()->make();  
        
        $request = [
            'sku' => $product->sku,
            'transaction_id' => Str::random(10),
            'email' => 'hi@sendbox.uk',
            'placeholders' => [
                'customer_name' => 'John Doe',
                'product_name' => $product->name
            ]
        ];
        
        $emailHelper = new EmailHelper();
        $emailHelper->setProduct($product);
        $emailHelper->createContentForProduct($request);
        $this->assertEquals($emailHelper->getTransactionId(), $request['transaction_id']);
    }    
    
    public function test_sendby_product_placeholder_exists()
    {
        $product = Product::factory()->forTemplate()->make();  
        
        $request = [
            'sku' => $product->sku,
            'transaction_id' => Str::random(10),
            'email' => 'hi@sendbox.uk',
            'placeholders' => [
                'customer_name' => 'John Doe',
                'product_name' => $product->name
            ]
        ];
        
        $emailHelper = new EmailHelper();
        $emailHelper->setProduct($product);
        $emailHelper->createContentForProduct($request);
        $this->assertArrayHasKey('customer_name', $emailHelper->getPlaceholders());
    }         

    public function test_sendby_product_template_filename()
    {
        $product = Product::factory()->forTemplate()->make();  
        
        $request = [
            'sku' => $product->sku,
            'transaction_id' => Str::random(10),
            'email' => 'hi@sendbox.uk',
            'placeholders' => [
                'customer_name' => 'John Doe',
                'product_name' => $product->name
            ]
        ];
        
        $emailHelper = new EmailHelper();
        $emailHelper->setProduct($product);
        $emailHelper->createContentForProduct($request);
        $this->assertEquals($product->template->filename, $emailHelper->getTemplate()->filename);
    }       

    public function test_sending_email()
    {

        $product = Product::factory()->forTemplate()->make();  
        
        $request = [
            'sku' => $product->sku,
            'transaction_id' => Str::random(10),
            'email' => 'hi@sendbox.uk',
            'placeholders' => [
                'customer_name' => 'John Doe',
                'product_name' => $product->name
            ]
        ];
        
        $emailHelper = new EmailHelper();
        $emailHelper->setProduct($product);
        $emailHelper->createContentForProduct($request);
 
        Mail::fake();

        // Assert that no mailables were sent...
        Mail::assertNothingSent();

        $mailable = new PostMail($emailHelper);
        Mail::to('test@example.local')->send($mailable);

        Mail::assertSent(PostMail::class); // passes
 
        // Assert a specific type of mailable was dispatched meeting the given truth test...
         Mail::assertSent(function (PostMail $mail) use ($emailHelper) {
            return $mail->email_model->getSubject() === $emailHelper->getSubject();
        });  
 
        // Assert a mailable was sent twice...
        Mail::assertSent(PostMail::class, 1);
    }

}