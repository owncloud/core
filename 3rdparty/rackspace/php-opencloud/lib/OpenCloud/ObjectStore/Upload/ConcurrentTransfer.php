<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud\ObjectStore\Upload;

use Guzzle\Http\ReadLimitEntityBody;
use Guzzle\Http\EntityBody;

/**
 * A transfer type which executes in a concurrent fashion, i.e. with multiple workers uploading at once. Each worker is
 * charged with uploading a particular chunk of data. The entity body is fragmented into n pieces - calculated by
 * dividing the total size by the individual part size.
 *
 * @codeCoverageIgnore
 */
class ConcurrentTransfer extends AbstractTransfer
{
    public function transfer()
    {
        $totalParts = (int) ceil($this->entityBody->getContentLength() / $this->partSize);
        $workers = min($totalParts, $this->options['concurrency']);
        $parts = $this->collectParts($workers);
        
        while ($this->transferState->count() < $totalParts) {
            
            $completedParts = $this->transferState->count();
            $requests = array();
            
            // Iterate over number of workers until total completed parts is what we need it to be
            for ($i = 0; $i < $workers && ($completedParts + $i) < $totalParts; $i++) {
                
                // Offset is the current pointer multiplied by the standard chunk length
                $offset = ($completedParts + $i) * $this->partSize;
                $parts[$i]->setOffset($offset);
                
                // If this segment is empty (i.e. buffering a half-full chunk), break the iteration
                if ($parts[$i]->getContentLength() == 0) {
                    break;
                }

                // Add this to the request queue for later processing
                $requests[] = TransferPart::createRequest(
                    $parts[$i], 
                    $this->transferState->count() + $i + 1, 
                    $this->client, 
                    $this->options
                );
            }

            // Iterate over our queued requests and process them
            foreach ($this->client->send($requests) as $response) {
                // Add this part to the TransferState
                $this->transferState->addPart(TransferPart::fromResponse($response));
            }
        }
    }

    /**
     * Partitions the entity body into an array - each worker is represented by a key, and the value is a
     * ReadLimitEntityBody object, whose read limit is fixed based on this object's partSize value. This will always
     * ensure the chunks are sent correctly.
     *
     * @param int    The total number of workers
     * @return array The worker array
     */
    private function collectParts($workers)
    {
        $uri = $this->entityBody->getUri();
        
        $array = array(new ReadLimitEntityBody($this->entityBody, $this->partSize));
        
        for ($i = 1; $i < $workers; $i++) {
        	// Need to create a fresh EntityBody, otherwise you'll get weird 408 responses
            $array[] = new ReadLimitEntityBody(new EntityBody(fopen($uri, 'r')), $this->partSize);
        }

        return $array;
    }
    
}