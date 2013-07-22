<?php

namespace OpenCloud\CloudMonitoring\Resource;

/**
 * ReadonlyResource class.
 * 
 * @extends AbstractResource
 */
class ReadonlyResource extends AbstractResource
{
    
    public function Create($params = array()) 
    { 
        $this->NoCreate(); 
    }

    public function Update($params = array()) 
    { 
        $this->NoUpdate(); 
    }

    public function Delete($params = array()) 
    { 
        $this->NoDelete(); 
    }

}