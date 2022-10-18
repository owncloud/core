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

namespace Google\Service\Contentwarehouse;

class AssistantDevicesPlatformProtoTriggerCondition extends \Google\Model
{
  protected $requiredStateValuesType = AssistantDevicesPlatformProtoArgSpec::class;
  protected $requiredStateValuesDataType = 'map';
  /**
   * @var string
   */
  public $simpleTts;
  /**
   * @var string
   */
  public $status;

  /**
   * @param AssistantDevicesPlatformProtoArgSpec[]
   */
  public function setRequiredStateValues($requiredStateValues)
  {
    $this->requiredStateValues = $requiredStateValues;
  }
  /**
   * @return AssistantDevicesPlatformProtoArgSpec[]
   */
  public function getRequiredStateValues()
  {
    return $this->requiredStateValues;
  }
  /**
   * @param string
   */
  public function setSimpleTts($simpleTts)
  {
    $this->simpleTts = $simpleTts;
  }
  /**
   * @return string
   */
  public function getSimpleTts()
  {
    return $this->simpleTts;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantDevicesPlatformProtoTriggerCondition::class, 'Google_Service_Contentwarehouse_AssistantDevicesPlatformProtoTriggerCondition');
