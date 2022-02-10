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
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $matchedPortRange;
  /**
   * @var string
   */
  public $matchedProtocol;
  /**
   * @var string
   */
  public $networkUri;
  /**
   * @var string
   */
  public $target;
  /**
   * @var string
   */
  public $uri;
  /**
   * @var string
   */
  public $vip;

  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setMatchedPortRange($matchedPortRange)
  {
    $this->matchedPortRange = $matchedPortRange;
  }
  /**
   * @return string
   */
  public function getMatchedPortRange()
  {
    return $this->matchedPortRange;
  }
  /**
   * @param string
   */
  public function setMatchedProtocol($matchedProtocol)
  {
    $this->matchedProtocol = $matchedProtocol;
  }
  /**
   * @return string
   */
  public function getMatchedProtocol()
  {
    return $this->matchedProtocol;
  }
  /**
   * @param string
   */
  public function setNetworkUri($networkUri)
  {
    $this->networkUri = $networkUri;
  }
  /**
   * @return string
   */
  public function getNetworkUri()
  {
    return $this->networkUri;
  }
  /**
   * @param string
   */
  public function setTarget($target)
  {
    $this->target = $target;
  }
  /**
   * @return string
   */
  public function getTarget()
  {
    return $this->target;
  }
  /**
   * @param string
   */
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  /**
   * @return string
   */
  public function getUri()
  {
    return $this->uri;
  }
  /**
   * @param string
   */
  public function setVip($vip)
  {
    $this->vip = $vip;
  }
  /**
   * @return string
   */
  public function getVip()
  {
    return $this->vip;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ForwardingRuleInfo::class, 'Google_Service_NetworkManagement_ForwardingRuleInfo');
