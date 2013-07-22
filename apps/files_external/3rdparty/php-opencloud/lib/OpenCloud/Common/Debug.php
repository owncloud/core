<?php

namespace OpenCloud\Common;

class Debug 
{
    
    const PREFIX = 'DEBUG';
    const FORMAT = "%s : (%s) : %s\r\n";
    
    protected $debugState = false;

    public function setDebug($state)
    {
        $this->setState($state);
    }
    
    public function setState($state = true) 
    {
        $this->debugState = $state;
    }
    
    public function isEnabled()
    {
        return $this->debugState;
    }
    
    public static function logMessage(Base $class, array $arguments = array())
    {    
        // Retrieve and unset format as first element
        $format = $arguments[0];
        unset($arguments[0]);
        
        // Format message and output
        if (empty($arguments)) {
            $message = $format;
        } else {
            $message = vsprintf($format, $arguments);
        }
        
        $message .= "\r\n";
        
        return self::outputString($class, $message);
    }
    
    private static function outputString(Base $class, $message)
    {
        // Format according to a generic style
        $string = sprintf(self::FORMAT, self::PREFIX, get_class($class), $message);
        
        // Either echo or return message
        if ($class->getDebugOutputStyle()) {
            echo $string;
        } else {
            return $string;
        }
    }
    
    public static function investigate(Base $class)
    {
        $namespace = get_class($class);
        
        // Show information about this object
        echo trim(sprintf(self::FORMAT, self::PREFIX, $namespace, ''));
        echo "\r\n";
        echo "PARENT CLASS: " . get_parent_class($class);
        echo "\r\n";
        echo "CLASS PROPERTIES: "; print_r(get_class_vars($namespace));
        echo "\r\n";
        echo "CLASS METHODS: "; print_r(get_class_methods($namespace));
        
        return $class;
    }
    
}
