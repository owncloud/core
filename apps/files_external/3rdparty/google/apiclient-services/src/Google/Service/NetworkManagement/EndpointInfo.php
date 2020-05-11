<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

class Google_Service_NetworkManagement_EndpointInfo extends Google_Model
{
  public $destinationIp;
  public $destinationNetworkUri;
  public $destinationPort;
  public $protocol;
  public $sourceIp;
  public $sourceNetworkUri;
  public $sourcePort;

  public function setDestinationIp($destinationIp)
  {
    $this->destinationIp = $destinationIp;
  }
  public function getDestinationIp()
  {
    return $this->destinationIp;
  }
  public function setDestinationNetworkUri($destinationNetworkUri)
  {
    $this->destinationNetworkUri = $destinationNetworkUri;
  }
  public function getDestinationNetworkUri()
  {
    return $this->destinationNetworkUri;
  }
  public function setDestinationPort($destinationPort)
  {
    $this->destinationPort = $destinationPort;
  }
  public function getDestinationPort()
  {
    return $this->destinationPort;
  }
  public function setProtocol($protocol)
  {
    $this->protocol = $protocol;
  }
  public function getProtocol()
  {
    return $this->protocol;
  }
  public function setSourceIp($sourceIp)
  {
    $this->sourceIp = $sourceIp;
  }
  public function getSourceIp()
  {
    return $this->sourceIp;
  }
  public function setSourceNetworkUri($sourceNetworkUri)
  {
    $this->sourceNetworkUri = $sourceNetworkUri;
  }
  public function getSourceNetworkUri()
  {
    return $this->sourceNetworkUri;
  }
  public function setSourcePort($sourcePort)
  {
    $this->sourcePort = $sourcePort;
  }
  public function getSourcePort()
  {
    return $this->sourcePort;
  }
}
