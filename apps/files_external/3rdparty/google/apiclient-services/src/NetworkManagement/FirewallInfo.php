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

class FirewallInfo extends \Google\Collection
{
  protected $collection_key = 'targetTags';
  /**
   * @var string
   */
  public $action;
  /**
   * @var string
   */
  public $direction;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $firewallRuleType;
  /**
   * @var string
   */
  public $networkUri;
  /**
   * @var string
   */
  public $policy;
  /**
   * @var int
   */
  public $priority;
  /**
   * @var string[]
   */
  public $targetServiceAccounts;
  /**
   * @var string[]
   */
  public $targetTags;
  /**
   * @var string
   */
  public $uri;

  /**
   * @param string
   */
  public function setAction($action)
  {
    $this->action = $action;
  }
  /**
   * @return string
   */
  public function getAction()
  {
    return $this->action;
  }
  /**
   * @param string
   */
  public function setDirection($direction)
  {
    $this->direction = $direction;
  }
  /**
   * @return string
   */
  public function getDirection()
  {
    return $this->direction;
  }
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
  public function setFirewallRuleType($firewallRuleType)
  {
    $this->firewallRuleType = $firewallRuleType;
  }
  /**
   * @return string
   */
  public function getFirewallRuleType()
  {
    return $this->firewallRuleType;
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
  public function setPolicy($policy)
  {
    $this->policy = $policy;
  }
  /**
   * @return string
   */
  public function getPolicy()
  {
    return $this->policy;
  }
  /**
   * @param int
   */
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  /**
   * @return int
   */
  public function getPriority()
  {
    return $this->priority;
  }
  /**
   * @param string[]
   */
  public function setTargetServiceAccounts($targetServiceAccounts)
  {
    $this->targetServiceAccounts = $targetServiceAccounts;
  }
  /**
   * @return string[]
   */
  public function getTargetServiceAccounts()
  {
    return $this->targetServiceAccounts;
  }
  /**
   * @param string[]
   */
  public function setTargetTags($targetTags)
  {
    $this->targetTags = $targetTags;
  }
  /**
   * @return string[]
   */
  public function getTargetTags()
  {
    return $this->targetTags;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FirewallInfo::class, 'Google_Service_NetworkManagement_FirewallInfo');
