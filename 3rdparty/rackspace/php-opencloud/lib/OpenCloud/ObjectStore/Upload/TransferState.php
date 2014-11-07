<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\ObjectStore\Upload;

/**
 * Represents the current state of the Transfer.
 *
 * @codeCoverageIgnore
 */
class TransferState
{
    /**
     * @var array Holds all of the parts which have been transferred.
     */
    protected $completedParts = array();

    /**
     * @var bool
     */
    protected $running;

    /**
     * @return $this
     */
    public static function factory()
    {
        $self = new self();
        return $self->init();
    }

    /**
     * @param TransferPart $part
     */
    public function addPart(TransferPart $part)
    {
        $this->completedParts[] = $part;
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->completedParts);
    }

    /**
     * @return bool
     */
    public function isRunning()
    {
        return $this->running;
    }

    /**
     * @return $this
     */
    public function init()
    {
        $this->running = true;
        
        return $this;
    }

    /**
     * @return $this
     */
    public function cancel()
    {
        $this->running = false;
        
        return $this;
    }
    
}