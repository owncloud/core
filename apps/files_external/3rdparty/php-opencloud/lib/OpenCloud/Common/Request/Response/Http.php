<?php

namespace OpenCloud\Common\Request\Response;

use OpenCloud\Common\Base;

/**
 * The HttpResponse returns an object with status information, separated
 * headers, and any response body necessary.
 *
 * @api
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */
 
class Http extends Base 
{

    private $errno;
    private $error;
    private $info = array();
    private $body;
    private $headers = array();

    /**
     * The constructor parses everything necessary
     */
    public function __construct($request, $data) 
    {
        // save the raw data (who knows? we might need it)
        $this->body = $data;

        // and split each line into name: value pairs
        foreach($request->ReturnHeaders() as $line) {
            if (preg_match('/^([^:]+):\s+(.+?)\s*$/', $line, $matches)) {
                $this->headers[$matches[1]] = $matches[2];
            } else {
                $this->headers[$line] = trim($line);
            }
        }

        // debug caching
        if (isset($this->headers['Cache-Control'])) {
            $this->debug('Cache-Control: %s', $this->headers['Cache-Control']);
        }

        if (isset($this->headers['Expires'])) {
            $this->debug('Expires: %s', $this->headers['Expires']);
        }

        // set some other data
        $this->info = $request->info();
        $this->errno = $request->errno();
        $this->error = $request->error();
    }

    /**
     * Returns the full body of the request
     *
     * @return string
     */
    public function HttpBody() 
    {
        return $this->body;
    }

    /**
     * Returns an array of headers
     *
     * @return associative array('header'=>value)
     */
    public function Headers() 
    {
        return $this->headers;
    }

    /**
     * Returns a single header
     *
     * @return string with the value of the requested header, or NULL
     */
    public function Header($name) 
    {
        return isset($this->headers[$name]) ? $this->headers[$name] : NULL;
    }

    /**
     * Returns an array of information
     *
     * @return array
     */
    public function info() 
    {
        return $this->info;
    }

    /**
     * Returns the most recent error number
     *
     * @return integer
     */
    public function errno()
    {
        return $this->errno;
    }

    /**
     * Returns the most recent error message
     *
     * @return string
     */
    public function error() 
    {
        return $this->error;
    }

    /**
     * Returns the HTTP status code
     *
     * @return integer
     */
    public function HttpStatus() 
    {
        return $this->info['http_code'];
    }

}
