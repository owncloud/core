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

class Google_Service_AlertCenter_RuleViolationInfo extends Google_Collection
{
  protected $collection_key = 'triggeredActionTypes';
  public $dataSource;
  protected $matchInfoType = 'Google_Service_AlertCenter_MatchInfo';
  protected $matchInfoDataType = 'array';
  public $recipients;
  protected $resourceInfoType = 'Google_Service_AlertCenter_ResourceInfo';
  protected $resourceInfoDataType = '';
  protected $ruleInfoType = 'Google_Service_AlertCenter_RuleInfo';
  protected $ruleInfoDataType = '';
  public $suppressedActionTypes;
  public $trigger;
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
   * @param Google_Service_AlertCenter_MatchInfo
   */
  public function setMatchInfo($matchInfo)
  {
    $this->matchInfo = $matchInfo;
  }
  /**
   * @return Google_Service_AlertCenter_MatchInfo
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
   * @param Google_Service_AlertCenter_ResourceInfo
   */
  public function setResourceInfo(Google_Service_AlertCenter_ResourceInfo $resourceInfo)
  {
    $this->resourceInfo = $resourceInfo;
  }
  /**
   * @return Google_Service_AlertCenter_ResourceInfo
   */
  public function getResourceInfo()
  {
    return $this->resourceInfo;
  }
  /**
   * @param Google_Service_AlertCenter_RuleInfo
   */
  public function setRuleInfo(Google_Service_AlertCenter_RuleInfo $ruleInfo)
  {
    $this->ruleInfo = $ruleInfo;
  }
  /**
   * @return Google_Service_AlertCenter_RuleInfo
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
