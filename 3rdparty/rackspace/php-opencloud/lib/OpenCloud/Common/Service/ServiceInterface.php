<?php

namespace OpenCloud\Common\Service;

use Guzzle\Http\ClientInterface;

interface ServiceInterface
{
    public function setClient(ClientInterface $client);

    public function getClient();

    public function setEndpoint($endpoint);

    public function getEndpoint();

    public function getUrl();
}