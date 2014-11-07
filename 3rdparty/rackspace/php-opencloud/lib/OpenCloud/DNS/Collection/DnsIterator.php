<?php

namespace OpenCloud\DNS\Collection;

use OpenCloud\Common\Collection\PaginatedIterator;

class DnsIterator extends PaginatedIterator
{
    const MARKER = 'offset';

    public function updateMarkerToCurrent()
    {
        $this->currentMarker = $this->key();
    }

    protected function shouldAppend()
    {
        if (!$this->currentMarker) {
            return false;
        }

        if ($this->position > $this->getOption('limit.page') && $this->getOption('limit.page') % $this->position == 0) {
            return true;
        }

        if ($this->currentMarker % $this->getOption('limit.page') == 0) {
            return true;
        }

        return false;
    }

}