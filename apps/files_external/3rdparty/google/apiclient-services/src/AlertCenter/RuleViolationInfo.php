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
  public $dataSource;
  protected $matchInfoType = MatchInfo::class;
  protected $matchInfoDataType = 'array';
  public $recipients;
  protected $resourceInfoType = ResourceInfo::class;
  protected $resourceInfoDataType = '';
  protected $ruleInfoType = RuleInfo::class;
  protected $ruleInfoDataType = '';
  public $suppressedActionTypes;
  public $trigger;
  protected $triggeredActionInfoType = ActionInfo::class;
  protected $triggeredActionInfoDataType = 'array';
  public $triggeredActionTypes;
  public $triggeringUserEmail;

  public function setDataSource($dataSource)
  {
    $this->dataSource = $dataSource;
  }
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
  public function setRecipients($recipients)
  {
    $this->recipients = $recipients;
  }
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
  public function setSuppressedActionTypes($suppressedActionTypes)
  {
    $this->suppressedActionTypes = $suppressedActionTypes;
  }
  public function getSuppressedActionTypes()
  {
    return $this->suppressedActionTypes;
  }
  public function setTrigger($trigger)
  {
    $this->trigger = $trigger;
  }
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
  public function setTriggeredActionTypes($triggeredActionTypes)
  {
    $this->triggeredActionTypes = $triggeredActionTypes;
  }
  public function getTriggeredActionTypes()
  {
    return $this->triggeredActionTypes;
  }
  public function setTriggeringUserEmail($triggeringUserEmail)
  {
    $this->triggeringUserEmail = $triggeringUserEmail;
  }
  public function getTriggeringUserEmail()
  {
    return $this->triggeringUserEmail;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RuleViolationInfo::class, 'Google_Service_AlertCenter_RuleViolationInfo');
