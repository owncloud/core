<?php

namespace League\Plates\Extension;

use League\Plates\Engine;
use League\Plates\Template\Template;
use LogicException;

/**
 * Extension that adds a number of URI checks.
 */
class URI implements ExtensionInterface
{
    /**
     * Instance of the current template.
     * @var Template
     */
    public $template;

    /**
     * The request URI.
     * @var string
     */
    protected $uri;

    /**
     * The request URI as an array.
     * @var array
     */
    protected $parts;

    /**
     * Create new URI instance.
     * @param string $uri
     */
    public function __construct($uri)
    {
        $this->uri = $uri;
        $this->parts = explode('/', $this->uri);
    }

    /**
     * Register extension functions.
     * @param Engine $engine
     * @return null
     */
    public function register(Engine $engine)
    {
        $engine->registerFunction('uri', array($this, 'runUri'));
    }

    /**
     * Perform URI check.
     * @param  null|integer|string $var1
     * @param  mixed               $var2
     * @param  mixed               $var3
     * @param  mixed               $var4
     * @return mixed
     */
    public function runUri($var1 = null, $var2 = null, $var3 = null, $var4 = null)
    {
        if (is_null($var1)) {
            return $this->uri;
        }

        if (is_numeric($var1) and is_null($var2)) {
            return array_key_exists($var1, $this->parts) ? $this->parts[$var1] : null;
        }

        if (is_numeric($var1) and is_string($var2)) {
            return $this->checkUriSegmentMatch($var1, $var2, $var3, $var4);
        }

        if (is_string($var1)) {
            return $this->checkUriRegexMatch($var1, $var2, $var3);
        }

        throw new LogicException('Invalid use of the uri function.');
    }

    /**
     * Perform a URI segment match.
     * @param  integer $key
     * @param  string  $string
     * @param  mixed   $returnOnTrue
     * @param  mixed   $returnOnFalse
     * @return mixed
     */
    protected function checkUriSegmentMatch($key, $string, $returnOnTrue = null, $returnOnFalse = null)
    {
        if (array_key_exists($key, $this->parts) && $this->parts[$key] === $string) {
            return is_null($returnOnTrue) ? true : $returnOnTrue;
        }

        return is_null($returnOnFalse) ? false : $returnOnFalse;
    }

    /**
     * Perform a regular express match.
     * @param  string $regex
     * @param  mixed  $returnOnTrue
     * @param  mixed  $returnOnFalse
     * @return mixed
     */
    protected function checkUriRegexMatch($regex, $returnOnTrue = null, $returnOnFalse = null)
    {
        if (preg_match('#^' . $regex . '$#', $this->uri) === 1) {
            return is_null($returnOnTrue) ? true : $returnOnTrue;
        }

        return is_null($returnOnFalse) ? false : $returnOnFalse;
    }
}
