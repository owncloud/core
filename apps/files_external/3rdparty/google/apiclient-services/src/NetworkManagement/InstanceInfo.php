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

namespace Google\Service\NetworkManagement;

class InstanceInfo extends \Google\Collection
{
  protected $collection_key = 'networkTags';
  public $displayName;
  public $externalIp;
  public $interface;
  public $internalIp;
  public $networkTags;
  public $networkUri;
  public $serviceAccount;
  public $uri;

  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setExternalIp($externalIp)
  {
    $this->externalIp = $externalIp;
  }
  public function getExternalIp()
  {
    return $this->externalIp;
  }
  public function setInterface($interface)
  {
    $this->interface = $interface;
  }
  public function getInterface()
  {
    return $this->interface;
  }
  public function setInternalIp($internalIp)
  {
    $this->internalIp = $internalIp;
  }
  public function getInternalIp()
  {
    return $this->internalIp;
  }
  public function setNetworkTags($networkTags)
  {
    $this->networkTags = $networkTags;
  }
  public function getNetworkTags()
  {
    return $this->networkTags;
  }
  public function setNetworkUri($networkUri)
  {
    $this->networkUri = $networkUri;
  }
  public function getNetworkUri()
  {
    return $this->networkUri;
  }
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  public function getUri()
  {
    return $this->uri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InstanceInfo::class, 'Google_Service_NetworkManagement_InstanceInfo');
