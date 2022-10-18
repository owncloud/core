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

class AssistantApiCoreTypesGovernedRingtoneTaskMetadataGentleWakeInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $effectDurationMs;
  /**
   * @var bool
   */
  public $isEnabled;
  /**
   * @var string
   */
  public $startTimedeltaMs;

  /**
   * @param string
   */
  public function setEffectDurationMs($effectDurationMs)
  {
    $this->effectDurationMs = $effectDurationMs;
  }
  /**
   * @return string
   */
  public function getEffectDurationMs()
  {
    return $this->effectDurationMs;
  }
  /**
   * @param bool
   */
  public function setIsEnabled($isEnabled)
  {
    $this->isEnabled = $isEnabled;
  }
  /**
   * @return bool
   */
  public function getIsEnabled()
  {
    return $this->isEnabled;
  }
  /**
   * @param string
   */
  public function setStartTimedeltaMs($startTimedeltaMs)
  {
    $this->startTimedeltaMs = $startTimedeltaMs;
  }
  /**
   * @return string
   */
  public function getStartTimedeltaMs()
  {
    return $this->startTimedeltaMs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiCoreTypesGovernedRingtoneTaskMetadataGentleWakeInfo::class, 'Google_Service_Contentwarehouse_AssistantApiCoreTypesGovernedRingtoneTaskMetadataGentleWakeInfo');
