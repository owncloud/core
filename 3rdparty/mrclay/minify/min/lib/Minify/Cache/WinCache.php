<?php
/**
 * Class Minify_Cache_Wincache
 * @package Minify
 */

/**
 * WinCache-based cache class for Minify
 * 
 * <code>
 * Minify::setCache(new Minify_Cache_WinCache());
 * </code>
 * 
 * @package Minify
 * @author Matthias Fax
 **/
class Minify_Cache_WinCache
{
    
    /**
     * Create a Minify_Cache_Wincache object, to be passed to
     * Minify::setCache().
     *
     *
     * @param int $expire seconds until expiration (default = 0
     * meaning the item will not get an expiration date)
     */
    public function __construct($expire = 0)
    {
        if (!function_exists('wincache_ucache_info')) {
            throw new Exception("WinCache for PHP is not installed to be able to use Minify_Cache_WinCache!");
        }
        $this->_exp = $expire;
    }
    
    /**
     * Write data to cache.
     *
     * @param string $id cache id
     *
     * @param string $data
     *
     * @return bool success
     */
    public function store($id, $data)
    {
        return wincache_ucache_set($id, "{$_SERVER['REQUEST_TIME']}|{$data}", $this->_exp);
    }
    
    /**
     * Get the size of a cache entry
     *
     * @param string $id cache id
     *
     * @return int size in bytes
     */
    public function getSize($id)
    {
        if (!$this->_fetch($id)) {
            return false;
        }
        return (function_exists('mb_strlen') && ((int) ini_get('mbstring.func_overload') & 2)) ? mb_strlen($this->_data, '8bit') : strlen($this->_data);
    }
    
    /**
     * Does a valid cache entry exist?
     *
     * @param string $id cache id
     *
     * @param int $srcMtime mtime of the original source file(s)
     *
     * @return bool exists
     */
    public function isValid($id, $srcMtime)
    {
        return ($this->_fetch($id) && ($this->_lm >= $srcMtime));
    }
    
    /**
     * Send the cached content to output
     *
     * @param string $id cache id
     */
    public function display($id)
    {
        echo $this->_fetch($id) ? $this->_data : '';
    }
    
    /**
     * Fetch the cached content
     *
     * @param string $id cache id
     *
     * @return string
     */
    public function fetch($id)
    {
        return $this->_fetch($id) ? $this->_data : '';
    }
    
    private $_exp = NULL;
    
    // cache of most recently fetched id
    private $_lm = NULL;
    private $_data = NULL;
    private $_id = NULL;
    
    /**
     * Fetch data and timestamp from WinCache, store in instance
     *
     * @param string $id
     *
     * @return bool success
     */
    private function _fetch($id)
    {
        if ($this->_id === $id) {
            return true;
        }
        $suc = false;
        $ret = wincache_ucache_get($id, $suc);
        if (!$suc) {
            $this->_id = NULL;
            return false;
        }
        list($this->_lm, $this->_data) = explode('|', $ret, 2);
        $this->_id = $id;
        return true;
    }
}