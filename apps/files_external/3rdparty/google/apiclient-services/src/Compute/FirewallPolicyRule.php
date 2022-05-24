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
  /**
   * @var string
   */
  public $action;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $direction;
  /**
   * @var bool
   */
  public $disabled;
  /**
   * @var bool
   */
  public $enableLogging;
  /**
   * @var string
   */
  public $kind;
  protected $matchType = FirewallPolicyRuleMatcher::class;
  protected $matchDataType = '';
  /**
   * @var int
   */
  public $priority;
  /**
   * @var string
   */
  public $ruleName;
  /**
   * @var int
   */
  public $ruleTupleCount;
  /**
   * @var string[]
   */
  public $targetResources;
  protected $targetSecureTagsType = FirewallPolicyRuleSecureTag::class;
  protected $targetSecureTagsDataType = 'array';
  /**
   * @var string[]
   */
  public $targetServiceAccounts;

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
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
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
   * @param bool
   */
  public function setDisabled($disabled)
  {
    $this->disabled = $disabled;
  }
  /**
   * @return bool
   */
  public function getDisabled()
  {
    return $this->disabled;
  }
  /**
   * @param bool
   */
  public function setEnableLogging($enableLogging)
  {
    $this->enableLogging = $enableLogging;
  }
  /**
   * @return bool
   */
  public function getEnableLogging()
  {
    return $this->enableLogging;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
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
   * @param string
   */
  public function setRuleName($ruleName)
  {
    $this->ruleName = $ruleName;
  }
  /**
   * @return string
   */
  public function getRuleName()
  {
    return $this->ruleName;
  }
  /**
   * @param int
   */
  public function setRuleTupleCount($ruleTupleCount)
  {
    $this->ruleTupleCount = $ruleTupleCount;
  }
  /**
   * @return int
   */
  public function getRuleTupleCount()
  {
    return $this->ruleTupleCount;
  }
  /**
   * @param string[]
   */
  public function setTargetResources($targetResources)
  {
    $this->targetResources = $targetResources;
  }
  /**
   * @return string[]
   */
  public function getTargetResources()
  {
    return $this->targetResources;
  }
  /**
   * @param FirewallPolicyRuleSecureTag[]
   */
  public function setTargetSecureTags($targetSecureTags)
  {
    $this->targetSecureTags = $targetSecureTags;
  }
  /**
   * @return FirewallPolicyRuleSecureTag[]
   */
  public function getTargetSecureTags()
  {
    return $this->targetSecureTags;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FirewallPolicyRule::class, 'Google_Service_Compute_FirewallPolicyRule');
