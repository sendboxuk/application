<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'subject', 'filename', 'placeholders', 'sensitive_placeholders'];

    protected $casts = [
        'placeholders' => 'array',
        'sensitive_placeholders' => 'array'
    ];

    public function setSensitivePlaceholdersAttribute($value)
    {
        $sensitive_placeholders = [];
    
        if (!is_array($value)){
            $array = \explode(',', $value);
        }else{
            $array = $value;
        }

        foreach($array as $item){
            $sensitive_placeholders[] = trim($item);
        }
    
        $this->attributes['sensitive_placeholders'] = json_encode($sensitive_placeholders);
    }

    public function getSensitivePlaceholdersListAttribute()
    {
        $return = null;
        
        if (!is_array($this->sensitive_placeholders)){
            return null;
        }

        foreach($this->sensitive_placeholders as $placeholder){
            $return .= $placeholder . ', ';
        }
        $return = \substr($return, 0, -2);
        return $return;
    }

    
    public function setPlaceholdersAttribute($value)
    {
        $placeholders = [];
    
        if (!is_array($value)){
            $array = \explode(',', $value);
        }else{
            $array = $value;
        }

        foreach($array as $item){
            $placeholders[] = trim($item);
        }
    
        $this->attributes['placeholders'] = json_encode($placeholders);
    }

    public function getPlaceholdersListAttribute()
    {
        $return = null;
        
        if (!is_array($this->placeholders)){
            return null;
        }

        foreach($this->placeholders as $placeholder){
            $return .= $placeholder . ', ';
        }
        $return = \substr($return, 0, -2);
        return $return;
    }

    public function getSamplePlaceholdersAttribute()
    {
        $return = [];
        
        if (!is_array($this->placeholders)){
            return null;
        }

        if (!is_array($this->sensitive_placeholders)){
            return null;
        }        

        foreach($this->placeholders as $placeholder){
            $return[$placeholder] = 'UPDATE DATA';
        }

        foreach($this->sensitive_placeholders as $placeholder){
            $return[$placeholder] = 'UPDATE DATA';
        }        

        return $return;
    }    
}