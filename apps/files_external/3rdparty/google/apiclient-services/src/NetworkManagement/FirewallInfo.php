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
  public $action;
  public $direction;
  public $displayName;
  public $firewallRuleType;
  public $networkUri;
  public $policy;
  public $priority;
  public $targetServiceAccounts;
  public $targetTags;
  public $uri;

  public function setAction($action)
  {
    $this->action = $action;
  }
  public function getAction()
  {
    return $this->action;
  }
  public function setDirection($direction)
  {
    $this->direction = $direction;
  }
  public function getDirection()
  {
    return $this->direction;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setFirewallRuleType($firewallRuleType)
  {
    $this->firewallRuleType = $firewallRuleType;
  }
  public function getFirewallRuleType()
  {
    return $this->firewallRuleType;
  }
  public function setNetworkUri($networkUri)
  {
    $this->networkUri = $networkUri;
  }
  public function getNetworkUri()
  {
    return $this->networkUri;
  }
  public function setPolicy($policy)
  {
    $this->policy = $policy;
  }
  public function getPolicy()
  {
    return $this->policy;
  }
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  public function getPriority()
  {
    return $this->priority;
  }
  public function setTargetServiceAccounts($targetServiceAccounts)
  {
    $this->targetServiceAccounts = $targetServiceAccounts;
  }
  public function getTargetServiceAccounts()
  {
    return $this->targetServiceAccounts;
  }
  public function setTargetTags($targetTags)
  {
    $this->targetTags = $targetTags;
  }
  public function getTargetTags()
  {
    return $this->targetTags;
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
class_alias(FirewallInfo::class, 'Google_Service_NetworkManagement_FirewallInfo');
