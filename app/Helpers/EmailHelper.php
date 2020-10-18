<?php
namespace App\Helpers;

use App\Models\Template;
use App\Models\Product;


class EmailHelper
{
    protected $email;
    protected $template;
    protected $product;
    protected $placeholders;
    protected $transaction_id;
    protected $subject;
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

    public function createContentForTemplate($request)
    {
        $template = Template::find($request->template);
        $placeholders = $template->placeholders;
        $variables = [];

        foreach ($placeholders as $placeholder) {
            $variables[$placeholder] = $request['placeholders'][$placeholder];
        }
        $variables['transaction_id'] = $request['transaction_id'];

        $this->setTransactionId($request['transaction_id']);
        $this->setSubject($template->subject);
        $this->setEmail($request['email']);
        $this->setTemplate($template);
        $this->setPlaceholders($variables);
    }

    public function createContentForProduct($request)
    {
        $product = Product::where('sku', '=', $request['sku'])->firstOrFail();
        $placeholders = $product->template->placeholders;
        $variables = [];

        foreach ($placeholders as $placeholder) {
            $variables[$placeholder] = $request['placeholders'][$placeholder];
        }
        $variables['transaction_id'] = $request['transaction_id'];

        $this->setTransactionId($request['transaction_id']);
        $this->setSubject($product->template->subject);
        $this->setEmail($request['email']);
        $this->setTemplate($product->template);
        $this->setPlaceholders($variables);
    }    

    public function createContentForTemplateByImporter($row)
    {
        $template = Template::find($row[0]);
        $placeholders = $template->placeholders;
        $variables = [];

        foreach ($placeholders as $placeholder) {
            $variables[$placeholder] = $request['placeholders'][$placeholder];
        }
        $variables['transaction_id'] = $request['transaction_id'];

        $this->setTransactionId($request['transaction_id']);
        $this->setSubject($template->subject);
        $this->setEmail($request['email']);
        $this->setTemplate($template);
        $this->setPlaceholders($variables);
    }
}