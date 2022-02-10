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

namespace Google\Service\AlertCenter;

class RuleViolationInfo extends \Google\Collection
{
  protected $collection_key = 'triggeredActionTypes';
  /**
   * @var string
   */
  public $dataSource;
  protected $matchInfoType = MatchInfo::class;
  protected $matchInfoDataType = 'array';
  /**
   * @var string[]
   */
  public $recipients;
  protected $resourceInfoType = ResourceInfo::class;
  protected $resourceInfoDataType = '';
  protected $ruleInfoType = RuleInfo::class;
  protected $ruleInfoDataType = '';
  /**
   * @var string[]
   */
  public $suppressedActionTypes;
  /**
   * @var string
   */
  public $trigger;
  protected $triggeredActionInfoType = ActionInfo::class;
  protected $triggeredActionInfoDataType = 'array';
  /**
   * @var string[]
   */
  public $triggeredActionTypes;
  /**
   * @var string
   */
  public $triggeringUserEmail;

  /**
   * @param string
   */
  public function setDataSource($dataSource)
  {
    $this->dataSource = $dataSource;
  }
  /**
   * @return string
   */
  public function getDataSource()
  {
    return $this->dataSource;
  }
  /**
   * @param MatchInfo[]
   */
  public function setMatchInfo($matchInfo)
  {
    $this->matchInfo = $matchInfo;
  }
  /**
   * @return MatchInfo[]
   */
  public function getMatchInfo()
  {
    return $this->matchInfo;
  }
  /**
   * @param string[]
   */
  public function setRecipients($recipients)
  {
    $this->recipients = $recipients;
  }
  /**
   * @return string[]
   */
  public function getRecipients()
  {
    return $this->recipients;
  }
  /**
   * @param ResourceInfo
   */
  public function setResourceInfo(ResourceInfo $resourceInfo)
  {
    $this->resourceInfo = $resourceInfo;
  }
  /**
   * @return ResourceInfo
   */
  public function getResourceInfo()
  {
    return $this->resourceInfo;
  }
  /**
   * @param RuleInfo
   */
  public function setRuleInfo(RuleInfo $ruleInfo)
  {
    $this->ruleInfo = $ruleInfo;
  }
  /**
   * @return RuleInfo
   */
  public function getRuleInfo()
  {
    return $this->ruleInfo;
  }
  /**
   * @param string[]
   */
  public function setSuppressedActionTypes($suppressedActionTypes)
  {
    $this->suppressedActionTypes = $suppressedActionTypes;
  }
  /**
   * @return string[]
   */
  public function getSuppressedActionTypes()
  {
    return $this->suppressedActionTypes;
  }
  /**
   * @param string
   */
  public function setTrigger($trigger)
  {
    $this->trigger = $trigger;
  }
  /**
   * @return string
   */
  public function getTrigger()
  {
    return $this->trigger;
  }
  /**
   * @param ActionInfo[]
   */
  public function setTriggeredActionInfo($triggeredActionInfo)
  {
    $this->triggeredActionInfo = $triggeredActionInfo;
  }
  /**
   * @return ActionInfo[]
   */
  public function getTriggeredActionInfo()
  {
    return $this->triggeredActionInfo;
  }
  /**
   * @param string[]
   */
  public function setTriggeredActionTypes($triggeredActionTypes)
  {
    $this->triggeredActionTypes = $triggeredActionTypes;
  }
  /**
   * @return string[]
   */
  public function getTriggeredActionTypes()
  {
    return $this->triggeredActionTypes;
  }
  /**
   * @param string
   */
  public function setTriggeringUserEmail($triggeringUserEmail)
  {
    $this->triggeringUserEmail = $triggeringUserEmail;
  }
  /**
   * @return string
   */
  public function getTriggeringUserEmail()
  {
    return $this->triggeringUserEmail;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RuleViolationInfo::class, 'Google_Service_AlertCenter_RuleViolationInfo');
