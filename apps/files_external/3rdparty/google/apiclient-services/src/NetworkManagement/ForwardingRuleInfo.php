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

class ForwardingRuleInfo extends \Google\Model
{
  public $displayName;
  public $matchedPortRange;
  public $matchedProtocol;
  public $networkUri;
  public $target;
  public $uri;
  public $vip;

  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setMatchedPortRange($matchedPortRange)
  {
    $this->matchedPortRange = $matchedPortRange;
  }
  public function getMatchedPortRange()
  {
    return $this->matchedPortRange;
  }
  public function setMatchedProtocol($matchedProtocol)
  {
    $this->matchedProtocol = $matchedProtocol;
  }
  public function getMatchedProtocol()
  {
    return $this->matchedProtocol;
  }
  public function setNetworkUri($networkUri)
  {
    $this->networkUri = $networkUri;
  }
  public function getNetworkUri()
  {
    return $this->networkUri;
  }
  public function setTarget($target)
  {
    $this->target = $target;
  }
  public function getTarget()
  {
    return $this->target;
  }
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  public function getUri()
  {
    return $this->uri;
  }
  public function setVip($vip)
  {
    $this->vip = $vip;
  }
  public function getVip()
  {
    return $this->vip;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ForwardingRuleInfo::class, 'Google_Service_NetworkManagement_ForwardingRuleInfo');
