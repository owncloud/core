<?php

namespace OpenCloud\Common\Request\Response;

class Blank extends Http 
{
    public $errno;
    public $error;
    public $info;
    public $body;
    public $headers = array();
    public $status = 200;
    public $rawdata;

    public function __construct(array $values = array()) 
    {
        foreach($values as $name => $value) {
            $this->$name = $value;
        }
    }

    public function HttpBody() 
    { 
        return $this->body; 
    }

    public function HttpStatus() 
    { 
        return $this->status; 
    }
    
}
