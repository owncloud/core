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

namespace Google\Service\Compute;

class FirewallPolicyRule extends \Google\Collection
{
  protected $collection_key = 'targetServiceAccounts';
  public $action;
  public $description;
  public $direction;
  public $disabled;
  public $enableLogging;
  public $kind;
  protected $matchType = FirewallPolicyRuleMatcher::class;
  protected $matchDataType = '';
  public $priority;
  public $ruleTupleCount;
  public $targetResources;
  public $targetServiceAccounts;

  public function setAction($action)
  {
    $this->action = $action;
  }
  public function getAction()
  {
    return $this->action;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDirection($direction)
  {
    $this->direction = $direction;
  }
  public function getDirection()
  {
    return $this->direction;
  }
  public function setDisabled($disabled)
  {
    $this->disabled = $disabled;
  }
  public function getDisabled()
  {
    return $this->disabled;
  }
  public function setEnableLogging($enableLogging)
  {
    $this->enableLogging = $enableLogging;
  }
  public function getEnableLogging()
  {
    return $this->enableLogging;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param FirewallPolicyRuleMatcher
   */
  public function setMatch(FirewallPolicyRuleMatcher $match)
  {
    $this->match = $match;
  }
  /**
   * @return FirewallPolicyRuleMatcher
   */
  public function getMatch()
  {
    return $this->match;
  }
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  public function getPriority()
  {
    return $this->priority;
  }
  public function setRuleTupleCount($ruleTupleCount)
  {
    $this->ruleTupleCount = $ruleTupleCount;
  }
  public function getRuleTupleCount()
  {
    return $this->ruleTupleCount;
  }
  public function setTargetResources($targetResources)
  {
    $this->targetResources = $targetResources;
  }
  public function getTargetResources()
  {
    return $this->targetResources;
  }
  public function setTargetServiceAccounts($targetServiceAccounts)
  {
    $this->targetServiceAccounts = $targetServiceAccounts;
  }
  public function getTargetServiceAccounts()
  {
    return $this->targetServiceAccounts;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FirewallPolicyRule::class, 'Google_Service_Compute_FirewallPolicyRule');
