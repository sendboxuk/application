<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'subject', 'filename', 'placeholders'];

    protected $casts = [
        'placeholders' => 'array'
    ];

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


}