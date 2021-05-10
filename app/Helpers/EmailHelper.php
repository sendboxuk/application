<?php
namespace App\Helpers;

use App\Models\Template;
use App\Models\Product;
use App\Models\Service;

class EmailHelper
{
    protected $email;
    protected $template;
    protected $product;
    protected $service;
    protected $placeholders;
    protected $transaction_id;
    protected $subject;
    protected $sensitive_keys;

    /**
     * Get the value of sensitive keys
     */ 
    public function getSensitiveKeys()
    {
        return $this->sensitive_keys;
    }

    /**
     * Set the value of sensitive keys
     *
     * @return  self
     */ 
    public function setSensitiveKeys($keys)
    {
        $this->sensitive_keys = $keys;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of template
     */ 
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Set the value of template
     *
     * @return  self
     */ 
    public function setTemplate($template)
    {
        $this->template = $template;

        return $this;
    }

    /**
     * Get the value of product
     */ 
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set the value of product
     *
     * @return  self
     */ 
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }


    /**
     * Get the value of transaction_id
     */ 
    public function getTransactionId()
    {
        return $this->transaction_id;
    }

    /**
     * Set the value of transaction_id
     *
     * @return  self
     */ 
    public function setTransactionId($transaction_id)
    {
        $this->transaction_id = $transaction_id;

        return $this;
    }

    /**
     * Get the value of subject
     */ 
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set the value of subject
     *
     * @return  self
     */ 
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get the value of placeholders
     */ 
    public function getPlaceholders()
    {
        return $this->placeholders;
    }

    /**
     * Set the value of placeholders
     *
     * @return  self
     */ 
    public function setPlaceholders($placeholders)
    {
        $this->placeholders = $placeholders;

        return $this;
    }

    /**
     * Get the value of Service
     */ 
    public function getService()
    {
        return $this->service;
    }

    public function createContentForTemplate($request)
    {
        if (!$this->template){
            $template = Template::find($request['template']);
        }else{
            $template = $this->template;
        }
        $this->setSensitiveKeys($template->sensitive_placeholders);
        $placeholders = array_merge($template->placeholders, $template->sensitive_placeholders);

        $variables = $this->updateVarialbleList($placeholders, $request);        

        $this->setTransactionId($request['transaction_id']);
        $this->setSubject($template->subject);
        $this->setEmail($request['email']);
        $this->setTemplate($template);
        $this->setPlaceholders($variables);
    }

    public function createContentForProduct($request)
    {
        if (!$this->product){
            $product = Product::where('sku', '=', $request['sku'])->firstOrFail();
        }else{
            $product = $this->product;
        }

        $template = $product->template;
        $this->setSensitiveKeys($template->sensitive_placeholders);
        $placeholders = array_merge($template->placeholders, $template->sensitive_placeholders);
        $variables = $this->updateVarialbleList($placeholders, $request);

        $this->setTransactionId($request['transaction_id']);
        $this->setSubject($product->template->subject);
        $this->setEmail($request['email']);
        $this->setTemplate($product->template);
        $this->setPlaceholders($variables);
    }    

    public function createContentForService($request)
    {
        if (!$this->service){
            $service = Service::where('id', '=', $request['service'])->firstOrFail();
        }else{
            $service = $this->service;
        }
        
        $this->service = $service;

        $template = $service->template;
        $this->setSensitiveKeys($template->sensitive_placeholders);
        $placeholders = array_merge($template->placeholders, $template->sensitive_placeholders);
        $variables = $this->updateVarialbleList($placeholders, $request);

        $this->setTransactionId($request['transaction_id']);
        $this->setSubject($service->template->subject);
        $this->setEmail($service->emails);
        $this->setTemplate($service->template);
        $this->setPlaceholders($variables);
    }    
 

    private function updateVarialbleList($placeholders, $request){
        $variables = [];

        foreach ($placeholders as $placeholder) {
            if (isset($request['placeholders'][$placeholder])){
                $variables[$placeholder] = $request['placeholders'][$placeholder];
            }else{
                $variables[$placeholder] = 'Not Defined';
            }
        }
        $variables['transaction_id'] = $request['transaction_id'];
        return $variables;        
    }
}